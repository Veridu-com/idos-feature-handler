<?php

declare(strict_types = 1);

namespace Cli\Utils;

use sampa\Core;
use libphonenumber\PhoneNumberUtil;
use HumanNameParser\Parser as NameParser;
use HumanNameParser\Name;
use Gender\Gender;

final class Utils {
    private $nameParser;

    public static function getInstance() {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new static;
        }

        return $instance;
    }

    private function __construct() {
        $this->nameParser = new NameParser;
    }

    /* ADDRESS UTILITIES */
    private function addressParse($fullAddress) {
        static $cache = array();
        if (isset($cache[$fullAddress])) {
            return $cache[$fullAddress];
        }

        $escapedAddress = escapeshellarg($fullAddress);
        $return = exec(sprintf('address-parser %s', $escapedAddress), $parsed, $returnValue);

        if (($returnValue) || (empty($parsed))) {
            $components = preg_split('/[,-]/', $fullAddress);
            $return = array(
                'address1' => (isset($components[0]) ? trim($components[0]) : null),
                'address2' => (isset($components[1]) ? trim($components[1]) : null),
                'cityName' => (isset($components[2]) ? trim($components[2]) : null),
                'regionName' => (isset($components[3]) ? trim($components[3]) : null),
                'postalCode' => (isset($components[4]) ? trim($components[4]) : null),
                'countryName' => (isset($components[5]) ? trim($components[5]) : null)
            );
            $cache[$fullAddress] = $return;
            return $return;
        }

        $components = array();
        foreach ($parsed as $item) {
            $item = trim($item);
            $sepPosition = strpos($item, ':');
            $label = substr($item, 0, $sepPosition);
            $value = substr($item, $sepPosition + 1);
            if (! isset($components[$label])) {
                $components[$label] = trim($value);
            }
        }

        $return = array();
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

        return null;
    }

    public function countryName($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['countryName'])) {
            return $parsedAddress['countryName'];
        }

        return null;
    }

    public function postalCode($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['postalCode'])) {
            return $parsedAddress['postalCode'];
        }

        return null;
    }

    public function regionName($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['regionName'])) {
            return $parsedAddress['regionName'];
        }

        return null;
    }

    public function streetAddress1($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['address1'])) {
            return $parsedAddress['address1'];
        }

        return null;
    }

    public function streetAddress2($fullAddress) {
        $parsedAddress = $this->addressParse($fullAddress);

        if (isset($parsedAddress['address2'])) {
            return $parsedAddress['address2'];
        }

        return null;
    }

    /* COUNTRY UTILITIES */

    public function postalCodeToCity($code) {
        return null;
    }

    public function postalCodeToRegion($code) {
        return null;
    }

    public function postalCodeToCountry($code) {
        return null;
    }

    public function codeToCountry($code) {
        return null;
        static $cache = array();
        try {
            if (isset($cache[$code])) {
                return $cache[$code];
            }

            $this->sql->exec('SELECT "name" FROM "countries" WHERE "code" = :code', array('code' => strtoupper($code)));
            if ($this->sql->count() == 0) {
                return $code;
            }

            $res = $this->sql->next();
            $cache[$code] = $res['name'];
            return $res['name'];
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function regionFromCity($city) {
        return null;
    }

    public function countryFromCity($city) {
        return null;
        // Disabled Code (needs improved data source)
        // static $cache = array();
        // try {
        //  if (isset($cache[$city]))
        //      return $cache[$city];
        //  $this->sql->exec('SELECT "countries"."name" FROM "cities" INNER JOIN countries ON ("countries"."code" = "cities"."country") WHERE "city" ILIKE :city LIMIT 1', array('city' => $city));
        //  if ($this->sql->count() == 0)
        //      return null;
        //  $res = $this->sql->next();
        //  $cache[$city] = $res['name'];
        //  return $res['name'];
        // } catch (\Exception $exception) {
        //  return null;
        // }
    }

    public function geoCode($address) {
        // https://www.geocode.farm/v3/json/forward/?addr=Rua%20Doutor%20Serafim%20Vieira%20de%20Almeida,%20295%20-%20Sala%201,%20Jardim%20Para%C3%ADso&country=br&lang=en&count=1
    }

    /* NAME UTILITIES */

    private function checkList($name, $type) {
        return false;
        try {
            $name = Matcher::normalize_string($name);
            $values = array(
                    'name' => $name,
                    'len' => ceil(strlen($name) / 2),
                    'type' => $type
                );
            $this->sql->exec('SELECT * FROM "known_names" WHERE "type" = :type AND ("name" = :name OR "soundex" = SOUNDEX(:name) OR "metaphone" = METAPHONE(:name, 10) OR "dmetaphone1" = DMETAPHONE(:name) OR "dmetaphone2" = DMETAPHONE_ALT(:name)) AND LEVENSHTEIN("name", :name) < :len LIMIT 1', $values);
            return ($this->sql->count() > 0);
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function isListedName($name) {
        return false;
        static $cache = array();
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $values = array(
                'name' => $name,
                'len' => ceil(strlen($name) / 2)
            );
            $this->sql->exec('SELECT * FROM "known_names" WHERE ("name" = :name OR "soundex" = SOUNDEX(:name) OR "metaphone" = METAPHONE(:name, 10) OR "dmetaphone1" = DMETAPHONE(:name) OR "dmetaphone2" = DMETAPHONE_ALT(:name)) AND LEVENSHTEIN("name", :name) < :len LIMIT 1', $values);
            $cache[$name] = ($this->sql->count() > 0);
            return $cache[$name];
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function isFantasyName($name) {
        static $cache = array();
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'fantasy');
        return $cache[$name];
    }

    public function isSanctionedName($name) {
        static $cache = array();
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'sanctioned');
        return $cache[$name];
    }

    public function isPEPName($name) {
        static $cache = array();
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'pep');
        return $cache[$name];
    }

    public function isCelebrityName($name) {
        static $cache = array();
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'celebrity');
        return $cache[$name];
    }

    public function isSillyName($name) {
        static $cache = array();
        if (isset($cache[$name])) {
            return $cache[$name];
        }

        $cache[$name] = $this->checkList($name, 'silly');
        return $cache[$name];
    }

    public function isCommonName($name) {
        return false;
        static $cache = array();
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $values = array(
                'name' => $name,
                'len' => strlen($name) - 1
            );
            $this->sql->exec('SELECT * FROM "names" WHERE ("soundex" = SOUNDEX(:name) OR "metaphone" = METAPHONE(:name, 10) OR "dmetaphone1" = DMETAPHONE(:name) OR "dmetaphone2" = DMETAPHONE_ALT(:name)) AND LEVENSHTEIN("name", :name) < :len LIMIT 1', $values);
            $cache[$name] = ($this->sql->count() > 0);
            return $cache[$name];
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function nameGender($name) {
        return null;
        static $cache = array();
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $gender = new Gender;
            switch ($gender->get($name)) {
                case Gender::IS_FEMALE:
                case Gender::IS_MOSTLY_FEMALE:
                    $cache[$name] = 'female';
                    break;
                case Gender::IS_MALE:
                case Gender::IS_MOSTLY_MALE:
                    $cache[$name] = 'male';
                    break;
                default:
                    $this->sql->exec('SELECT COUNT(*) AS "total", "gender" FROM "names" WHERE LOWER("name") = :name GROUP BY "gender" ORDER BY COUNT(*) DESC LIMIT 1', array('name' => $name));
                    if ($this->sql->count() > 0) {
                        $res = $this->sql->next();
                        if ($res['gender'] === 'm') {
                            $cache[$name] = 'male';
                        } else if ($res['gender'] === 'f') {
                            $cache[$name] = 'female';
                        }

                        return $cache[$name];
                    }
                    $values = array(
                        'name' => $name,
                        'len' => (strlen($name) - 1)
                    );
                    $this->sql->exec('SELECT COUNT(*) AS "total", "gender" FROM "names" WHERE ("soundex" = SOUNDEX(:name) OR "metaphone" = METAPHONE(:name, 10) OR "dmetaphone1" = DMETAPHONE(:name) OR "dmetaphone2" = DMETAPHONE_ALT(:name)) AND LEVENSHTEIN("name", :name) < :len GROUP BY "gender" ORDER BY COUNT(*) DESC LIMIT 1', $values);
                    if ($this->sql->count() == 0) {
                        return null;
                    }

                    $res = $this->sql->next();
                    if ($res['gender'] === 'm') {
                        $cache[$name] = 'male';
                    } else if ($res['gender'] === 'f') {
                        $cache[$name] = 'female';
                    } else {
                        return null;
                    }
            }

            return $cache[$name];
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function nameCountry($name) {
        return null;
        static $cache = array();
        try {
            $name = Matcher::normalize_string($name);
            if (isset($cache[$name])) {
                return $cache[$name];
            }

            $values = array(
                'name' => $name,
                'len' => (strlen($name) - 1)
            );
            $this->sql->exec('SELECT COUNT(*), "country" FROM "names" WHERE ("soundex" = SOUNDEX(:name) OR "metaphone" = METAPHONE(:name, 10) OR "dmetaphone1" = DMETAPHONE(:name) OR "dmetaphone2" = DMETAPHONE_ALT(:name)) AND LEVENSHTEIN("name", :name) < :len GROUP BY "country" ORDER BY COUNT(*) DESC LIMIT 1', $values);
            if ($this->sql->count() == 0) {
                return null;
            }

            $res = $this->sql->next();
            $cache[$name] = $res['country'];
            return $res['country'];
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function titleGender($title) {
        $title = Matcher::normalize_string($title);
        $male = array(
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
        );
        if (in_array($title, $male)) {
            return 'male';
        }

        $female = array(
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
        );
        if (in_array($title, $female)) {
            return 'female';
        }

        return 'other';
    }

    public function academicTitle($name) {
        $name = trim($name);
        if (empty($name)) {
            return null;
        }

        try {
            $name = $this->nameParser->parse($name);
            return $name->getAcademicTitle();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function firstName($name) {
        $name = trim($name);
        if (empty($name)) {
            return null;
        }

        try {
            $name = $this->nameParser->parse($name);
            return $name->getFirstName();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function firstNameInitial($name) {
        $firstName = $this->firstName($name);
        if (empty($firstName)) {
            return null;
        }

        return $firstName[0];
    }

    public function middleName($name) {
        $name = trim($name);
        if (empty($name)) {
            return null;
        }

        try {
            $name = $this->nameParser->parse($name);
            return $name->getMiddleName();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function middleNameInitial($name) {
        $middleName = $this->middleName($name);
        if (empty($middleName)) {
            return null;
        }

        if (strpos($middleName, ' ') === false) {
            return $middleName[0];
        }

        $names = explode(' ', $middleName);
        $return = '';
        foreach ($names as $name) {
            $return .= $name[0];
        }

        return $return;
    }

    public function lastName($name) {
        $name = trim($name);
        if (empty($name)) {
            return null;
        }

        try {
            $name = $this->nameParser->parse($name);
            return $name->getLastName();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function lastNameInitial($name) {
        $lastName = $this->lastName($name);
        if (empty($lastName)) {
            return null;
        }

        return $lastName[0];
    }

    /* PHONE UTILITIES */

    private function phoneParse($phone, $countryCode = null) {
        try {
            $phone = preg_replace('/[^0-9+]/', '', $phone);
            if (empty($phone)) {
                return null;
            }

            return PhoneNumberUtil::getInstance()->parse($phone, $countryCode);
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function phoneCountry($phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);
        if (empty($phone)) {
            return null;
        }

        $code = PhoneNumberUtil::getInstance()->getRegionCodeForNumber($phone);
        return $this->codeToCountry($code);
    }

    public function phoneCountryCode($phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);
        if (empty($phone)) {
            return null;
        }

        return '+' . $phone->getCountryCode();
    }

    public function phoneNumber($phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);
        if (empty($phone)) {
            return null;
        }

        return $phone->getNationalNumber();
    }

    /* DATE UTILITIES */

    private function dateParse($date, $format = 'DMY') {
        $regexBuilder = array();
        $formatPosition = array();
        $formatLen = strlen($format);
        for ($i = 0; $i < $formatLen; $i++) {
            switch ($format[$i]) {
                case 'd':
                case 'D':
                    $formatPosition[] = 'day';
                    $regexBuilder[] = '([0-9]{1,2})';
                    break;
                case 'm':
                case 'M':
                    $formatPosition[] = 'month';
                    $regexBuilder[] = '([0-9]{1,2})';
                    break;
                case 'y':
                case 'Y':
                    $formatPosition[] = 'year';
                    $regexBuilder[] = '([0-9]{4})';
                    break;
            }
        }

        $regex = sprintf('/%s/', implode('.', $regexBuilder));
        if (preg_match($regex, $date, $matches)) {
            $map = array();
            $matchCount = count($matches);
            for ($i = 1; $i < $matchCount; $i++) {
                $map[$formatPosition[($i - 1)]] = $matches[$i];
            }

            return $map;
        }

        return null;
    }

    public function dayFromDate($date, $format = 'DMY') {
        $date = $this->dateParse($date, $format);
        if (empty($date)) {
            return null;
        }

        return $date['day'];
    }

    public function monthFromDate($date, $format = 'DMY') {
        $date = $this->dateParse($date, $format);
        if (empty($date)) {
            return null;
        }

        return $date['month'];
    }

    public function yearFromDate($date, $format = 'DMY') {
        $date = $this->dateParse($date, $format);
        if (empty($date)) {
            return null;
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
