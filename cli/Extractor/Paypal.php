<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

/**
 * This class is responsible for extracting the features from the paypal raw data that we got through the scraping process.
 * Each method in this class extracts a single feature from the raw data and returns this feature. The method called 'analyze'
 * will return an array with all the features that were extracted from the paypal.
 */
final class Paypal extends AbstractExtractor {
    private function profile_id(&$data) {
        if (empty($data['profile']['user_id'])) {
            return;
        }

        return $data['profile']['user_id'];
    }

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
        return [
            'isActive'          => ! empty($data),
            'profileId'         => $this->profile_id($data),
            'verifiedProfile'   => $this->verified_profile($data),
            'isACommonName'     => $this->is_common_name($data),
            'isListedName'      => $this->is_listed_name($data),
            'isFantasyName'     => $this->is_fantasy_name($data),
            'isSanctionedName'  => $this->is_sanctioned_name($data),
            'isPEPName'         => $this->is_pep_name($data),
            'isCelebrityName'   => $this->is_celebrity_name($data),
            'isSillyName'       => $this->is_silly_name($data),
            'nameGender'        => $this->name_gender($data),
            'fullName'          => $this->full_name($data),
            'firstName'         => $this->first_name($data),
            'firstNameInitial'  => $this->first_name_initial($data),
            'middleName'        => $this->middle_name($data),
            'middleNameInitial' => $this->middle_name_initial($data),
            'lastName'          => $this->last_name($data),
            'lastNameInitial'   => $this->last_name_initial($data),
            'emailAddress'      => $this->email_address($data),
            'emailUsername'     => $this->email_username($data),
            'phoneCountry'      => $this->phone($data, 'country'),
            'phoneCountryCode'  => $this->phone($data, 'countrycode'),
            'phoneNumber'       => $this->phone($data, 'number'),
            'accountType'       => $this->account_type($data),
            'profileAge'        => $this->profile_age($data),
            'countryName'       => $this->country_name($data),
            'cityName'          => $this->city_name($data),
            'regionName'        => $this->region_name($data),
            'postalCode'        => $this->postal_code($data),
            'streetAddress'     => $this->street_address($data),
            'birthDay'          => $this->birth($data, 2),
            'birthMonth'        => $this->birth($data, 1),
            'birthYear'         => $this->birth($data, 0)
        ];
    }
}
