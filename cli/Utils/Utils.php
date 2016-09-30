<?php

declare(strict_types = 1);

namespace Cli\Utils;

// use Gender\Gender;
use HumanNameParser\Name;
use HumanNameParser\Parser as NameParser;
use libphonenumber\PhoneNumberUtil;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Connection;

final class Utils {
    private $nameParser;

    public static function getInstance() {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new static();
        }

        return $instance;
    }

    private function __construct() {
        include __DIR__ . '/../../config/settings.php';

        $this->nameParser = new NameParser();

        $capsule = new Manager();
        $capsule->addConnection($appSettings['db']['sql']);

        $this->dbConnection = $capsule->getConnection();
    }

    /* ADDRESS UTILITIES */
    private function addressParse($fullAddress) {
        static $cache = [];
        if (isset($cache[$fullAddress])) {
            return $cache[$fullAddress];
        }

        $escapedAddress = escapeshellarg($fullAddress);
        $return         = exec(sprintf('address-parser %s', $escapedAddress), $parsed, $returnValue);

        if (($returnValue) || (empty($parsed))) {
            $components = preg_split('/[,-]/', $fullAddress);
            $return     = [
                'address1'    => (isset($components[0]) ? trim($components[0]) : null),
                'address2'    => (isset($components[1]) ? trim($components[1]) : null),
                'cityName'    => (isset($components[2]) ? trim($components[2]) : null),
                'regionName'  => (isset($components[3]) ? trim($components[3]) : null),
                'postalCode'  => (isset($components[4]) ? trim($components[4]) : null),
                'countryName' => (isset($components[5]) ? trim($components[5]) : null)
            ];
            $cache[$fullAddress] = $return;

            return $return;
        }

        $components = [];
        foreach ($parsed as $item) {
            $item        = trim($item);
            $sepPosition = strpos($item, ':');
            $label       = substr($item, 0, $sepPosition);
            $value       = substr($item, $sepPosition + 1);
            if (! isset($components[$label])) {
                $components[$label] = trim($value);
            }
        }

        $return = [];
        if (isset($components['road'])) {
            if (isset($components['house_number'])) {
                $return['address1'] = sprintf(
                    '%s %s',
                    $components['house_number'],
                    $components['road']
                );
            } else {
                $return['address1'] = $components['road'];
            }
        }

        if (isset($components['city'])) {
            $return['cityName'] = $components['city'];
        }

        if (isset($components['state'])) {
            $return['regionName'] = $components['state'];
        }

        if (isset($components['postcode'])) {
            $return['postalCode'] = $components['postcode'];
        }

        if (isset($components['country'])) {
            $return['countryName'] = $components['country'];
        }

        $cache[$fullAddress] = $return;

        return $return;
    }

    public function cityName($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['cityName'])) {
            return $parsedAddress['cityName'];
        }

        return;
    }

    public function countryName($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['countryName'])) {
            return $parsedAddress['countryName'];
        }

        return;
    }

    public function postalCode($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['postalCode'])) {
            return $parsedAddress['postalCode'];
        }

        return;
    }

    public function regionName($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['regionName'])) {
            return $parsedAddress['regionName'];
        }

        return;
    }

    public function streetAddress1($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['address1'])) {
            return $parsedAddress['address1'];
        }

        return;
    }

    public function streetAddress2($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['address2'])) {
            return $parsedAddress['address2'];
        }

        return;
    }

    /* COUNTRY UTILITIES */

    public function postalCodeToCity($code) {
        return;
    }

    public function postalCodeToRegion($code) {
        return;
    }

    public function postalCodeToCountry($code) {
        return;
    }

    public function codeToCountry($code) {
        static $cache = [];
        try {
            if (isset($cache[$code])) {
                return $cache[$code];
            }

            $this->dbConnection->setFetchMode(\PDO::FETCH_ASSOC);

            $result = $this->dbConnection->table('countries')
                ->where('code', '=', strtoupper($code))
                ->get(['name'])
                ->first();

            if (count($result) == 0) {
                return $code;
            }

            $cache[$code] = $result['name'];

            return $result['name'];
        } catch (\Exception $exception) {
            return;
        }
    }

    public function regionFromCity($city) {
        return;
    }

    public function countryFromCity($city) {
        static $cache = array();
        try {
            if (isset($cache[$city])) {
                return $cache[$city];
            }

            $this->dbConnection->setFetchMode(\PDO::FETCH_ASSOC);

            $result = $this->dbConnection->table('cities')
                ->join('countries', 'countries.code', '=', 'cities.country')
                ->where('cities.name', 'ILIKE', $city)
                ->limit(1)
                ->get(['countries.name']);

            if (count($result) == 0) {
                return null;
            }

            $res = $result->first();
            $cache[$city] = $res['name'];

            return $res['name'];
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function geoCode($address) {
        // https://www.geocode.farm/v3/json/forward/?addr=Rua%20Doutor%20Serafim%20Vieira%20de%20Almeida,%20295%20-%20Sala%201,%20Jardim%20Para%C3%ADso&country=br&lang=en&count=1
    }

    /* NAME UTILITIES */

    private function checkList($name, $type) {
        try {
            $name   = Matcher::normalize_string($name);

            return $this->dbConnection->table('known_names')
                ->where('type', '=', $type)
                ->where(function($query) use ($name) {
                    return $query->where('name', '=', $name)
                        ->orWhereRaw('soundex = SOUNDEX(?)', [$name])
                        ->orWhereRaw('metaphone = METAPHONE(?, 10)', [$name])
                        ->orWhereRaw('dmetaphone1 = DMETAPHONE(?)', [$name])
                        ->orWhereRaw('dmetaphone2 = DMETAPHONE_ALT(?)', [$name]);
                })
                ->whereRaw('LEVENSHTEIN("name", ?) < ?', [$name, ceil(strlen($name) / 2)])
                ->exists();

        } catch (\Exception $exception) {
            return false;
        }
    }

    public function isListedName($name) {

        static $cache = [];
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $result = $this->dbConnection->table('known_names')
                ->where(function($query) use ($name) {
                    return $query->where('name', '=', $name)
                        ->orWhereRaw('soundex = SOUNDEX(?)', [$name])
                        ->orWhereRaw('metaphone = METAPHONE(?, 10)', [$name])
                        ->orWhereRaw('dmetaphone1 = DMETAPHONE(?)', [$name])
                        ->orWhereRaw('dmetaphone2 = DMETAPHONE_ALT(?)', [$name]);
                })
                ->whereRaw('LEVENSHTEIN("name", ?) < ?', [$name, ceil(strlen($name) / 2)])
                ->exists();

            $cache[$name] = $result;

            return $cache[$name];
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function isFantasyName($name) {
        static $cache = [];
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'fantasy');

        return $cache[$name];
    }

    public function isSanctionedName($name) {
        static $cache = [];
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'sanctioned');

        return $cache[$name];
    }

    public function isPEPName($name) {
        static $cache = [];
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'pep');

        return $cache[$name];
    }

    public function isCelebrityName($name) {
        static $cache = [];
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'celebrity');

        return $cache[$name];
    }

    public function isSillyName($name) {
        static $cache = [];
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'silly');

        return $cache[$name];
    }

    public function isCommonName($name) {
        static $cache = [];
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $result = $this->dbConnection->table('names')
                ->where(function($query) use ($name) {
                    return $query->where('name', '=', $name)
                        ->orWhereRaw('soundex = SOUNDEX(?)', [$name])
                        ->orWhereRaw('metaphone = METAPHONE(?, 10)', [$name])
                        ->orWhereRaw('dmetaphone1 = DMETAPHONE(?)', [$name])
                        ->orWhereRaw('dmetaphone2 = DMETAPHONE_ALT(?)', [$name]);
                })
                ->whereRaw('LEVENSHTEIN("name", ?) < ?', [$name, ceil(strlen($name) / 2)])
                ->exists();

            $cache[$name] = ($result);

            return $cache[$name];
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function nameGender($name) {
        return;
        // static $cache = [];
        // try {
        //     $name = Matcher::normalize_string($name);
        //     if (isset($cache[$name])) {
        //         return $cache[$name];
        //     }

        //     $gender = new Gender();

        //     switch ($gender->get($name)) {
        //         case Gender::IS_FEMALE:
        //         case Gender::IS_MOSTLY_FEMALE:
        //             $cache[$name] = 'female';
        //             break;
        //         case Gender::IS_MALE:
        //         case Gender::IS_MOSTLY_MALE:
        //             $cache[$name] = 'male';
        //             break;
        //         default:
        //             $this->dbConnection->setFetchMode(\PDO::FETCH_ASSOC);

        //             $result = $this->dbConnection->table('names')
        //                 ->whereRaw('LOWER("name") = ?', [$name])
        //                 ->groupBy(['gender'])
        //                 ->orderByRaw('count(*) DESC')
        //                 ->limit(1)
        //                 ->selectRaw('COUNT(*) as total, gender')
        //                 ->get(['*']);

        //             if (count($result) > 0) {
        //                 $res = $result->first();
        //                 if ($res['gender'] === 'm') {
        //                     $cache[$name] = 'male';
        //                 } elseif ($res['gender'] === 'f') {
        //                     $cache[$name] = 'female';
        //                 }

        //                 return $cache[$name];
        //             }

        //             $result = $this->dbConnection->table('names')
        //                 ->where(function($query) use ($name) {
        //                     return $query->whereRaw('soundex = SOUNDEX(?)', [$name])
        //                         ->orWhereRaw('metaphone = METAPHONE(?, 10)', [$name])
        //                         ->orWhereRaw('dmetaphone1 = DMETAPHONE(?)', [$name])
        //                         ->orWhereRaw('dmetaphone2 = DMETAPHONE_ALT(?)', [$name]);
        //                 })
        //                 ->whereRaw('LEVENSHTEIN("name", ?) < ?', [$name, ceil(strlen($name) / 2)])
        //                 ->groupBy(['gender'])
        //                 ->orderByRaw('COUNT(*) DESC')
        //                 ->limit(1)
        //                 ->selectRaw('COUNT(*) as total, gender')
        //                 ->get(['*']);

        //             if (count($result) == 0) {
        //                 return;
        //             }

        //             $res = $result->first();
        //             if ($res['gender'] === 'm') {
        //                 $cache[$name] = 'male';
        //             } elseif ($res['gender'] === 'f') {
        //                 $cache[$name] = 'female';
        //             } else {
        //                 return;
        //             }
        //     }

        //     return $cache[$name];
        // } catch (\Exception $exception) {
        //     return;
        // }
    }

    public function nameCountry($name) {
        static $cache = [];
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $this->dbConnection->setFetchMode(\PDO::FETCH_ASSOC);

            $result = $this->dbConnection->table('names')
                ->where(function($query) use ($name) {
                    return $query->whereRaw('soundex = SOUNDEX(?)', [$name])
                        ->orWhereRaw('metaphone = METAPHONE(?, 10)', [$name])
                        ->orWhereRaw('dmetaphone1 = DMETAPHONE(?)', [$name])
                        ->orWhereRaw('dmetaphone2 = DMETAPHONE_ALT(?)', [$name]);
                })
                ->whereRaw('LEVENSHTEIN("name", ?) < ?', [$name, ceil(strlen($name) / 2)])
                ->groupBy(['country'])
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->selectRaw('COUNT(*) as total, country')
                ->get(['*']);

            if (count($result) == 0) {
                return;
            }

            $res          = $result->first();
            $cache[$name] = $res['country'];

            return $res['country'];
        } catch (\Exception $exception) {
            return;
        }
    }

    public function titleGender($title) {
        $title = Matcher::normalize_string($title);
        $male  = [
            'arqo',
            'baron',
            'bibo',
            'br',
            'brother',
            'com',
            'docteur',
            'dom',
            'don',
            'doutor',
            'dr',
            'elder',
            'engo',
            'esq',
            'excelentissimo',
            'excmo',
            'exmo',
            'father',
            'fr',
            'herr',
            'hon',
            'honoravel',
            'ilmo',
            'ilustrissimo',
            'lord',
            'm',
            'master',
            'monseigneur',
            'monsieur',
            'mr',
            'padre',
            'pe',
            'pro',
            'prof',
            'rev',
            'reverand',
            'senhor',
            'senor don',
            'senor',
            'sir',
            'sire',
            'sr d',
            'sr',
            'vossa santidade'
        ];
        if (in_array($title, $male)) {
            return 'male';
        }

        $female = [
            'arqa',
            'biba',
            'coma',
            'dame',
            'docteure',
            'dona',
            'dra',
            'enga',
            'excelentissima',
            'excma',
            'exma',
            'frau',
            'ilma',
            'lady',
            'ma\'am',
            'madam',
            'madame',
            'mademoiselle',
            'miss',
            'mme',
            'mrs',
            'ms',
            'pra',
            'profa',
            'senhora',
            'senora dona',
            'senora',
            'senorita',
            'sis',
            'sister',
            'sra dna',
            'sra',
            'sra',
            'srta',
            'veuve'
        ];
        if (in_array($title, $female)) {
            return 'female';
        }

        return 'other';
    }

    public function academicTitle($name) {
        $name = trim($name);
        if (empty($name)) {
            return;
        }

        try {
            $name = $this->nameParser->parse($name);

            return $name->getAcademicTitle();
        } catch (\Exception $e) {
            return;
        }
    }

    public function firstName($name) {
        $name = trim($name);
        if (empty($name)) {
            return;
        }

        try {
            $name = $this->nameParser->parse($name);

            return $name->getFirstName();
        } catch (\Exception $e) {
            return;
        }
    }

    public function firstNameInitial($name) {
        $firstName = $this->firstName($name);
        if (empty($firstName)) {
            return;
        }

        return mb_substr($firstName, 0, 1);
    }

    public function middleName($name) {
        $name = trim($name);
        if (empty($name)) {
            return;
        }

        try {
            $name = $this->nameParser->parse($name);

            return $name->getMiddleName();
        } catch (\Exception $e) {
            return;
        }
    }

    public function middleNameInitial($name) {
        $middleName = $this->middleName($name);
        if (empty($middleName)) {
            return;
        }

        if (strpos($middleName, ' ') === false) {
            return mb_substr($middleName, 0, 1);
        }

        $names  = explode(' ', $middleName);
        $return = '';
        foreach ($names as $name) {
            $return .= mb_substr($name, 0, 1);
        }

        return $return;
    }

    public function lastName($name) {
        $name = trim($name);
        if (empty($name)) {
            return;
        }

        try {
            $name = $this->nameParser->parse($name);

            return $name->getLastName();
        } catch (\Exception $e) {
            return;
        }
    }

    public function lastNameInitial($name) {
        $lastName = $this->lastName($name);
        if (empty($lastName)) {
            return;
        }

        return mb_substr($lastName, 0, 1);
    }

    /* PHONE UTILITIES */

    private function phoneParse($phone, $countryCode = null) {
        try {
            $phone = preg_replace('/[^0-9+]/', '', $phone);
            if (empty($phone)) {
                return;
            }

            return PhoneNumberUtil::getInstance()->parse($phone, $countryCode);
        } catch (\Exception $exception) {
            return;
        }
    }

    public function phoneCountry($phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);
        if (empty($phone)) {
            return;
        }

        $code = PhoneNumberUtil::getInstance()->getRegionCodeForNumber($phone);

        return $this->codeToCountry($code);
    }

    public function phoneCountryCode($phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);
        if (empty($phone)) {
            return;
        }

        return '+' . $phone->getCountryCode();
    }

    public function phoneNumber($phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);
        if (empty($phone)) {
            return;
        }

        return $phone->getNationalNumber();
    }

    /* DATE UTILITIES */

    private function dateParse($date, $format = 'DMY') {
        $regexBuilder   = [];
        $formatPosition = [];
        $formatLen      = strlen($format);
        for ($i = 0; $i < $formatLen; $i++) {
            switch ($format[$i]) {
                case 'd':
                case 'D':
                    $formatPosition[] = 'day';
                    $regexBuilder[]   = '([0-9]{1,2})';
                    break;
                case 'm':
                case 'M':
                    $formatPosition[] = 'month';
                    $regexBuilder[]   = '([0-9]{1,2})';
                    break;
                case 'y':
                case 'Y':
                    $formatPosition[] = 'year';
                    $regexBuilder[]   = '([0-9]{4})';
                    break;
            }
        }

        $regex = sprintf('/%s/', implode('.', $regexBuilder));
        if (preg_match($regex, $date, $matches)) {
            $map        = [];
            $matchCount = count($matches);
            for ($i = 1; $i < $matchCount; $i++) {
                $map[$formatPosition[($i - 1)]] = $matches[$i];
            }

            return $map;
        }

        return;
    }

    public function dayFromDate($date, $format = 'DMY') {
        $date = $this->dateParse($date, $format);
        if (empty($date)) {
            return;
        }

        return $date['day'];
    }

    public function monthFromDate($date, $format = 'DMY') {
        $date = $this->dateParse($date, $format);
        if (empty($date)) {
            return;
        }

        return $date['month'];
    }

    public function yearFromDate($date, $format = 'DMY') {
        $date = $this->dateParse($date, $format);
        if (empty($date)) {
            return;
        }

        return $date['year'];
    }

    /* STRING UTILITIES */

    // http://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
