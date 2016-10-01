<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Paypal extends AbstractExtractor {
    private function verified_profile(&$data) {
        if (empty($data['profile']['verified_account']))
            return false;

        return $data['profile']['verified_account'] === 'true';
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
        if (empty($data['profile']['name']))
            return;

        return $data['profile']['name'];
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

    private function email_address(&$data) {
        if ((empty($data['profile']['email'])) || (strpos($data['profile']['email'], '@') === false))
            return;

        return $data['profile']['email'];
    }

    private function email_username(&$data) {
        $email = $this->email_address($data);
        if (is_null($email))
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function phone(&$data, $type) {
        if (empty($data['profile']['phone_number']))
            return;

        switch ($type) {
            case 'country':
                return Utils::getInstance()->phoneCountry($data['profile']['phone_number'], (empty($data['profile']['address']['country']) ? null : $data['profile']['address']['country']));
            case 'countrycode':
                return Utils::getInstance()->phoneCountryCode($data['profile']['phone_number'], (empty($data['profile']['address']['country']) ? null : $data['profile']['address']['country']));
            case 'number':
                return Utils::getInstance()->phoneNumber($data['profile']['phone_number'], (empty($data['profile']['address']['country']) ? null : $data['profile']['address']['country']));
            default:
                return;
        }
    }

    private function account_type(&$data) {
        if (empty($data['profile']['account_type']))
            return;

        return $data['profile']['account_type'];
    }

    private function profile_age(&$data) {
        if (empty($data['profile']['account_creation_date']))
            return;
        $timestamp = strtotime($data['profile']['account_creation_date']);
        if ($timestamp === false)
            return;

        return $timestamp;
    }

    private function country_name(&$data) {
        if (empty($data['profile']['address']['country']))
            return;

        return Utils::getInstance()->codeToCountry($data['profile']['address']['country']);
    }

    private function city_name(&$data) {
        if (empty($data['profile']['address']['locality']))
            return;

        return $data['profile']['address']['locality'];
    }

    private function region_name(&$data) {
        if (empty($data['profile']['address']['region']))
            return;

        return $data['profile']['address']['region'];
    }

    private function postal_code(&$data) {
        if (empty($data['profile']['address']['postal_code']))
            return;

        return preg_replace('/[^0-9A-Za-z]+/', '', $data['profile']['address']['postal_code']);
    }

    private function street_address(&$data) {
        if (empty($data['profile']['address']['street_address']))
            return;

        return $data['profile']['address']['street_address'];
    }

    private function birth(&$data, $position) {
        if (empty($data['profile']['birthday']))
            return 0;
        if (strpos($data['profile']['birthday'], '-') === false)
            return 0;
        $date = explode('-', $data['profile']['birthday']);
        if (isset($date[$position]))
            return intval($date[$position]);

        return 0;
    }

    public function analyze(array $data) : array {
        $facts                      = [];
        $facts['isActive']          = ! empty($data);
        $facts['verifiedProfile']   = $this->verified_profile($data);
        $facts['isACommonName']     = $this->is_common_name($data);
        $facts['isListedName']      = $this->is_listed_name($data);
        $facts['isFantasyName']     = $this->is_fantasy_name($data);
        $facts['isSanctionedName']  = $this->is_sanctioned_name($data);
        $facts['isPEPName']         = $this->is_pep_name($data);
        $facts['isCelebrityName']   = $this->is_celebrity_name($data);
        $facts['isSillyName']       = $this->is_silly_name($data);
        $facts['nameGender']        = $this->name_gender($data);
        $facts['fullName']          = $this->full_name($data);
        $facts['firstName']         = $this->first_name($data);
        $facts['firstNameInitial']  = $this->first_name_initial($data);
        $facts['middleName']        = $this->middle_name($data);
        $facts['middleNameInitial'] = $this->middle_name_initial($data);
        $facts['lastName']          = $this->last_name($data);
        $facts['lastNameInitial']   = $this->last_name_initial($data);
        $facts['emailAddress']      = $this->email_address($data);
        $facts['emailUsername']     = $this->email_username($data);
        $facts['phoneCountry']      = $this->phone($data, 'country');
        $facts['phoneCountryCode']  = $this->phone($data, 'countrycode');
        $facts['phoneNumber']       = $this->phone($data, 'number');
        $facts['accountType']       = $this->account_type($data);
        $facts['profileAge']        = $this->profile_age($data);
        $facts['countryName']       = $this->country_name($data);
        $facts['cityName']          = $this->city_name($data);
        $facts['regionName']        = $this->region_name($data);
        $facts['postalCode']        = $this->postal_code($data);
        $facts['streetAddress']     = $this->street_address($data);
        $facts['birthDay']          = $this->birth($data, 2);
        $facts['birthMonth']        = $this->birth($data, 1);
        $facts['birthYear']         = $this->birth($data, 0);

        return $facts;
    }
}
