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
        $facts                              = [];
        $facts['isActive']                  = ! empty($data);
        $facts['profilePicture']            = $this->profile_picture($data);
        $facts['isACommonName']             = $this->is_common_name($data);
        $facts['isListedName']              = $this->is_listed_name($data);
        $facts['isFantasyName']             = $this->is_fantasy_name($data);
        $facts['isSanctionedName']          = $this->is_sanctioned_name($data);
        $facts['isPEPName']                 = $this->is_pep_name($data);
        $facts['isCelebrityName']           = $this->is_celebrity_name($data);
        $facts['isSillyName']               = $this->is_silly_name($data);
        $facts['nameGender']                = $this->name_gender($data);
        $facts['fullName']                  = $this->full_name($data);
        $facts['firstName']                 = $this->first_name($data);
        $facts['firstNameInitial']          = $this->first_name_initial($data);
        $facts['middleName']                = $this->middle_name($data);
        $facts['middleNameInitial']         = $this->middle_name_initial($data);
        $facts['lastName']                  = $this->last_name($data);
        $facts['lastNameInitial']           = $this->last_name_initial($data);
        $facts['profileGender']             = $this->profile_gender($data);
        $facts['firstEmailAddress']         = $this->first_email_address($data);
        $facts['firstEmailUsername']        = $this->first_email_username($data);
        $facts['secondEmailAddress']        = $this->second_email_address($data);
        $facts['secondEmailUsername']       = $this->second_email_username($data);
        $facts['thirdEmailAddress']         = $this->third_email_address($data);
        $facts['thirdEmailUsername']        = $this->third_email_username($data);
        $facts['streetAddress']             = $this->street_address($data);
        $facts['cityName']                  = $this->city_name($data);
        $facts['regionName']                = $this->region_name($data);
        $facts['countryName']               = $this->country_name($data);
        $facts['postalCode']                = $this->postal_code($data);
        $facts['birthYear']                 = $this->birth_year($data);
        $facts['birthMonth']                = $this->birth_month($data);
        $facts['birthDay']                  = $this->birth_day($data);
        $facts['profileAge']                = $this->profile_age($data);
        $facts['firstPhoneCountry']         = $this->first_phone($data, 'country');
        $facts['firstPhoneCountryCode']     = $this->first_phone($data, 'countrycode');
        $facts['firstPhoneNumber']          = $this->first_phone($data, 'number');
        $facts['secondPhoneCountry']        = $this->second_phone($data, 'country');
        $facts['secondPhoneCountryCode']    = $this->second_phone($data, 'countrycode');
        $facts['secondPhoneNumber']         = $this->second_phone($data, 'number');
        $facts['numContacts']               = $this->num_contacts($data);
        $facts['profileNickname']           = $this->profile_nickname($data);
        $facts['firstMostRecentEducation']  = $this->first_most_recent_education($data);
        $facts['secondMostRecentEducation'] = $this->second_most_recent_education($data);
        $facts['thirdMostRecentEducation']  = $this->third_most_recent_education($data);
        $facts['firstMostRecentWork']       = $this->first_most_recent_work($data);
        $facts['secondMostRecentWork']      = $this->second_most_recent_work($data);
        $facts['thirdMostRecentWork']       = $this->third_most_recent_work($data);

        return $facts;
    }
}
