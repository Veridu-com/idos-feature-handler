<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Yahoo extends AbstractExtractor {
    private function _home_address(&$data) {
        if (isset($data['_home_address']))
            return $data['_home_address'];

        if (empty($data['profile']['addresses']))
            return;

        foreach ($data['profile']['addresses'] as $address)
        if ($address['type'] === 'HOME') {
            $data['_home_address'] = $address;
            break;
        }

        return $data['_home_address'];
    }

    private function _education(&$data) {
        if (isset($data['_education']))
            return $data['_education'];

        if (empty($data['profile']['schools']))
            return [];

        $data['_education'] = [];
        foreach ($data['profile']['schools'] as $school) {
            if (isset($school['schoolName'], $school['schoolType'], $school['startDate'], $school['endDate']))
            $data['_education'][] = [
                'name'       => $school['schoolName'],
                'type'       => $school['schoolType'],
                'city'       => isset($school['city']) ? $school['city'] : null,
                'state'      => isset($school['state']) ? $school['state'] : null,
                'country'    => isset($school['country']) ? $school['country'] : null,
                'start_date' => $school['startDate'],
                'end_date'   => $school['endDate']
            ];
        }

        if (count($data['_education']))
            usort(
                $data['_education'], function ($a, $b) {
                    if ($b['start_date'] == $a['start_date'])
                    return $b['end_date'] - $a['end_date'];

                    return $b['start_date'] - $a['start_date'];
                }
            );

        return $data['_education'];
    }

    private function _work(&$data) {
        if (isset($data['_work']))
            return $data['_work'];

        if (empty($data['profile']['works']))
            return [];

        $data['_work'] = [];
        foreach ($data['profile']['works'] as $work) {
            if (isset($work['workName'], $work['title'], $work['startDate'], $work['endDate']))
            $data['_work'][] = [
                'employer'    => $work['workName'],
                'position'    => $work['title'],
                'address'     => isset($work['address']) ? $work['address'] : null,
                'postal_code' => isset($work['postalCode']) ? $work['postalCode'] : null,
                'city'        => isset($work['city']) ? $work['city'] : null,
                'state'       => isset($work['state']) ? $work['state'] : null,
                'country'     => isset($work['country']) ? $work['country'] : null,
                'start_date'  => $work['startDate'],
                'end_date'    => $work['endDate']
            ];
        }

        if (count($data['_work']))
            usort(
                $data['_work'], function ($a, $b) {
                    if ($b['start_date'] == $a['start_date'])
                    return $b['end_date'] - $a['end_date'];

                    return $b['start_date'] - $a['start_date'];
                }
            );

        return $data['_work'];
    }

    private function profile_id(&$data) {
        if (empty($data['profile']['guid']['value'])) {
            return;
        }

        return $data['profile']['guid']['value'];
    }

    private function profile_picture(&$data) {
        if (empty($data['profile']['imageURL']))
            return;

        return $data['profile']['imageURL'];
    }

    private function profile_nickname(&$data) {
        if (empty($data['profile']['nickname']))
            return;

        return $data['profile']['nickname'];
    }

    private function is_common_name(&$data) {
        $name = $this->first_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isCommonName($name);
    }

    private function is_listed_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isListedName($name);
    }

    private function is_fantasy_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isFantasyName($name);
    }

    private function is_sanctioned_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isSanctionedName($name);
    }

    private function is_pep_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isPEPName($name);
    }

    private function is_celebrity_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isCelebrityName($name);
    }

    private function is_silly_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isSillyName($name);
    }

    private function name_gender(&$data) {
        $name = $this->first_name($data);
        if (is_null($name))
            return;

        return Utils::getInstance()->nameGender($name);
    }

    private function full_name(&$data) {
        if ((empty($data['profile']['givenName'])) && (empty($data['profile']['familyName'])))
            return;

        return sprintf('%s %s', trim($data['profile']['givenName']), trim($data['profile']['familyName']));
    }

    private function first_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->firstName($name);
    }

    private function first_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->firstNameInitial($name);
    }

    private function middle_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->middleName($name);
    }

    private function middle_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->middleNameInitial($name);
    }

    private function last_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->lastName($name);
    }

    private function last_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->lastNameInitial($name);
    }

    private function profile_gender(&$data) {
        if (empty($data['profile']['gender']))
            return;
        switch (strtolower($data['profile']['gender'])) {
            case 'm':
                return 'male';
            case 'f':
                return 'female';
            default:
                return 'other';
        }
    }

    private function first_email_address(&$data) {
        if (empty($data['profile']['emails'][0]['handle']))
            return;

        return $data['profile']['emails'][0]['handle'];
    }

    private function first_email_username(&$data) {
        $email = $this->first_email_address($data);
        if (is_null($email))
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function second_email_address(&$data) {
        if (empty($data['profile']['emails'][1]['handle']))
            return;

        return $data['profile']['emails'][1]['handle'];
    }

    private function second_email_username(&$data) {
        $email = $this->second_email_address($data);
        if (is_null($email))
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function third_email_address(&$data) {
        if (empty($data['profile']['emails'][2]['handle']))
            return;

        return $data['profile']['emails'][2]['handle'];
    }

    private function third_email_username(&$data) {
        $email = $this->third_email_address($data);
        if (is_null($email))
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function street_address(&$data) {
        $address = $this->_home_address($data);
        if ((empty($address)) || (empty($address['street'])))
            return;

        return $address['street'];
    }

    private function city_name(&$data) {
        $address = $this->_home_address($data);
        if ((empty($address)) || (empty($address['city'])))
            return;

        return $address['city'];
    }

    private function region_name(&$data) {
        $address = $this->_home_address($data);
        if ((empty($address)) || (empty($address['state'])))
            return;

        return $address['state'];
    }

    private function country_name(&$data) {
        $address = $this->_home_address($data);
        if ((empty($address)) || (empty($address['country'])))
            return;

        return Utils::getInstance()->codeToCountry($address['country']);
    }

    private function postal_code(&$data) {
        $address = $this->_home_address($data);
        if ((empty($address)) || (empty($address['postalCode'])))
            return;

        return preg_replace('/[^0-9A-Za-z]+/', '', $address['postalCode']);
    }

    private function birth_year(&$data) {
        if (empty($data['profile']['birthYear']))
            return 0;

        return intval($data['profile']['birthYear']);
    }

    private function birth_month(&$data) {
        if (empty($data['profile']['birthdate']))
            return 0;
        if (strpos($data['profile']['birthdate'], '/') === false)
            return 0;

        $date = explode('/', $data['profile']['birthdate']);

        return intval($date[0]);
    }

    private function birth_day(&$data) {
        if (empty($data['profile']['birthdate']))
            return 0;
        if (strpos($data['profile']['birthdate'], '/') === false)
            return 0;

        $date = explode('/', $data['profile']['birthdate']);
        if (isset($date[1]))
            return intval($date[1]);

        return 0;
    }

    private function profile_age(&$data) {
        if (empty($data['profile']['memberSince']))
            return;

        $age = strtotime($data['profile']['memberSince']);
        if ($age === false)
            return;

        return $age;
    }

    private function first_phone(&$data, $type) {
        if (empty($data['profile']['phones'][0]['number']))
            return;
        switch ($type) {
            case 'country':
                return Utils::getInstance()->phoneCountry("+{$data['profile']['phones'][0]['number']}");
            case 'countrycode':
                return Utils::getInstance()->phoneCountryCode("+{$data['profile']['phones'][0]['number']}");
            case 'number':
                return Utils::getInstance()->phoneNumber("+{$data['profile']['phones'][0]['number']}");
            default:
                return;
        }
    }

    private function second_phone(&$data, $type) {
        if (empty($data['profile']['phones'][1]['number']))
            return;
        switch ($type) {
            case 'country':
                return Utils::getInstance()->phoneCountry("+{$data['profile']['phones'][1]['number']}");
            case 'countrycode':
                return Utils::getInstance()->phoneCountryCode("+{$data['profile']['phones'][1]['number']}");
            case 'number':
                return Utils::getInstance()->phoneNumber("+{$data['profile']['phones'][1]['number']}");
            default:
                return;
        }
    }

    private function num_contacts(&$data) {
        if (empty($data['contacts']))
            return 0;

        return count($data['contacts']);
    }

    private function first_most_recent_education(&$data) {
        $educations = $this->_education($data);

        if (empty($educations[0]['name']))
            return;

        return $educations[0]['name'];
    }

    private function second_most_recent_education(&$data) {
        $educations = $this->_education($data);

        if (empty($educations[1]['name']))
            return;

        return $educations[1]['name'];
    }

    private function third_most_recent_education(&$data) {
        $educations = $this->_education($data);

        if (empty($educations[2]['name']))
            return;

        return $educations[2]['name'];
    }

    private function first_most_recent_work(&$data) {
        $works = $this->_work($data);

        if (empty($works[0]['name']))
            return;

        return $works[0]['name'];
    }

    private function second_most_recent_work(&$data) {
        $works = $this->_work($data);

        if (empty($works[1]['name']))
            return;

        return $works[1]['name'];
    }

    private function third_most_recent_work(&$data) {
        $works = $this->_work($data);

        if (empty($works[2]['name']))
            return;

        return $works[2]['name'];
    }

    public function analyze(array $data) : array {
        return [
            'isActive'                  => ! empty($data),
            'profileId'                 => $this->profile_id($data),
            'profilePicture'            => $this->profile_picture($data),
            'isACommonName'             => $this->is_common_name($data),
            'isListedName'              => $this->is_listed_name($data),
            'isFantasyName'             => $this->is_fantasy_name($data),
            'isSanctionedName'          => $this->is_sanctioned_name($data),
            'isPEPName'                 => $this->is_pep_name($data),
            'isCelebrityName'           => $this->is_celebrity_name($data),
            'isSillyName'               => $this->is_silly_name($data),
            'nameGender'                => $this->name_gender($data),
            'fullName'                  => $this->full_name($data),
            'firstName'                 => $this->first_name($data),
            'firstNameInitial'          => $this->first_name_initial($data),
            'middleName'                => $this->middle_name($data),
            'middleNameInitial'         => $this->middle_name_initial($data),
            'lastName'                  => $this->last_name($data),
            'lastNameInitial'           => $this->last_name_initial($data),
            'profileGender'             => $this->profile_gender($data),
            'firstEmailAddress'         => $this->first_email_address($data),
            'firstEmailUsername'        => $this->first_email_username($data),
            'secondEmailAddress'        => $this->second_email_address($data),
            'secondEmailUsername'       => $this->second_email_username($data),
            'thirdEmailAddress'         => $this->third_email_address($data),
            'thirdEmailUsername'        => $this->third_email_username($data),
            'streetAddress'             => $this->street_address($data),
            'cityName'                  => $this->city_name($data),
            'regionName'                => $this->region_name($data),
            'countryName'               => $this->country_name($data),
            'postalCode'                => $this->postal_code($data),
            'birthYear'                 => $this->birth_year($data),
            'birthMonth'                => $this->birth_month($data),
            'birthDay'                  => $this->birth_day($data),
            'profileAge'                => $this->profile_age($data),
            'firstPhoneCountry'         => $this->first_phone($data, 'country'),
            'firstPhoneCountryCode'     => $this->first_phone($data, 'countrycode'),
            'firstPhoneNumber'          => $this->first_phone($data, 'number'),
            'secondPhoneCountry'        => $this->second_phone($data, 'country'),
            'secondPhoneCountryCode'    => $this->second_phone($data, 'countrycode'),
            'secondPhoneNumber'         => $this->second_phone($data, 'number'),
            'numContacts'               => $this->num_contacts($data),
            'profileNickname'           => $this->profile_nickname($data),
            'firstMostRecentEducation'  => $this->first_most_recent_education($data),
            'secondMostRecentEducation' => $this->second_most_recent_education($data),
            'thirdMostRecentEducation'  => $this->third_most_recent_education($data),
            'firstMostRecentWork'       => $this->first_most_recent_work($data),
            'secondMostRecentWork'      => $this->second_most_recent_work($data),
            'thirdMostRecentWork'       => $this->third_most_recent_work($data)
        ];
    }
}
