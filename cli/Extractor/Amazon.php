<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Amazon extends AbstractExtractor {
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

    private function city_name(&$data) {
        $postalCode = $this->postal_code($data);
        if (is_null($postalCode))
            return;

        return Utils::getInstance()->postalCodeToCity($postalCode);
    }

    private function region_name(&$data) {
        $postalCode = $this->postal_code($data);
        if (is_null($postalCode))
            return;

        return Utils::getInstance()->postalCodeToRegion($postalCode);
    }

    private function country_name(&$data) {
        $postalCode = $this->postal_code($data);
        if (is_null($postalCode))
            return;

        return Utils::getInstance()->postalCodeToCountry($postalCode);
    }

    private function postal_code(&$data) {
        if (empty($data['profile']['postal_code']))
            return;

        return preg_replace('/[^0-9A-Za-z]+/', '', $data['profile']['postal_code']);
    }

    public function analyze(array $data) : array {
        $facts                      = [];
        $facts['isActive']          = ! empty($data);
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
        $facts['cityName']          = $this->city_name($data);
        $facts['regionName']        = $this->region_name($data);
        $facts['countryName']       = $this->country_name($data);
        $facts['postalCode']        = $this->postal_code($data);

        return $facts;
    }
}
