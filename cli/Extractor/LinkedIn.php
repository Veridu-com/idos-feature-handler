<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class LinkedIn extends AbstractExtractor {
    private function _connections(&$data) {
        if (isset($data['_connections']))
            return $data['_connections'];
        $data['_connections'] = Profile::linkedinConnections($data);

        return $data['_connections'];
    }

    private function _location_distribution(&$data) {
        if (isset($data['_location_distribution']))
            return $data['_location_distribution'];

        $location = [
            'city'    => [],
            'region'  => [],
            'country' => []
        ];
        $connections = $this->_connections($data);
        if (empty($connections))
            return $location;

        $utils = Utils::getInstance();
        foreach ($connections as $connection) {
            if (! empty($connection['location']['name'])) {
                if (strpos($connection['location']['name'], ',') === false)
                    $city = trim(str_replace('Area', '', $connection['location']['name']));
                else {
                    $name = explode(',', $connection['location']['name']);
                    $city = trim(str_replace('Area', '', $name[0]));
                }

                if (! empty($city)) {
                    if (! isset($location['city'][$city]))
                        $location['city'][$city] = 0;
                    $location['city'][$city]++;
                }
            }

            if (! empty($connection['location']['country']['code'])) {
                $country = $utils->codeToCountry($connection['location']['country']['code']);

                if (! empty($country)) {
                    if (! isset($location['country'][$country]))
                        $location['country'][$country] = 0;
                    $location['country'][$country]++;
                }
            }

        }

        arsort($location['city']);
        arsort($location['country']);
        $data['_location_distribution'] = $location;

        return $location;
    }

    private function _education(&$data) {
        if (isset($data['_education']))
            return $data['_education'];

        if (empty($data['profile']['educations']['values']))
            return [];

        $data['_education'] = [];
        foreach ($data['profile']['educations']['values'] as $education)
            if (isset($education['schoolName'], $education['startDate']['year'], $education['endDate']['year'])) {
                if (isset($education['degree']))
                    switch (strtolower($education['degree'])) {
                        case 'high school':
                            $type = 'High School';
                            break;
                        case 'associate\'s degree':
                        case 'bachelor\'s degree':
                        case 'master\'s degree':
                        case 'master of business administration (m.b.a.)':
                        case 'juris doctor (j.d.)':
                        case 'doctor of medicine (m.d.)':
                        case 'doctor of philosophy (ph.d.)':
                        case 'engineer\'s degree':
                            $type = 'College';
                            break;
                        default:
                            $type = 'Other';
                    }
                else
                    $type             = null;
                $data['_education'][] = [
                    'name'       => $education['schoolName'],
                    'start_year' => $education['startDate']['year'],
                    'end_year'   => $education['endDate']['year'],
                    'type'       => $type,
                    'course'     => (isset($education['fieldOfStudy']) ? $education['fieldOfStudy'] : null)
                ];
            }

        if (count($data['_education']))
            usort($data['_education'], function ($a, $b) {
                if ($b['start_year'] == $a['start_year'])
                    return $b['end_year'] - $a['end_year'];

                return $b['start_year'] - $a['start_year'];
            });

        return $data['_education'];
    }

    private function _workLocation($id, &$data) {
        if (empty($data['companies']))
            return;

        foreach ($data['companies'] as $company)
            if ((isset($company['id'])) && ($company['id'] == $id)) {
                if (isset($company['locations']['values'][0]['address']['city']))
                    return $company['locations']['values'][0]['address']['city'];

                return;
            }
    }

    private function _work(&$data) {
        if (isset($data['_work']))
            return $data['_work'];

        if ((empty($data['profile']['positions']['values'])) && (empty($data['profile']['threeCurrentPositions']['values'])) && (empty($data['profile']['threePastPositions']['values'])))
            return [];

        $data['_work'] = [];
        $seen          = [];
        if (! empty($data['profile']['positions']['values']))
            foreach ($data['profile']['positions']['values'] as $work)
                if (isset($work['company']['name'], $work['title'], $work['startDate']['year'])) {
                    $data['_work'][] = [
                        'employer'   => $work['company']['name'],
                        'position'   => $work['title'],
                        'location'   => (isset($work['company']['id']) ? $this->_workLocation($work['company']['id'], $data) : null),
                        'start_date' => $work['startDate']['year'],
                        'end_date'   => (empty($work['endDate']['year']) ? null : $work['endDate']['year'])
                    ];
                    $seen[] = $work['id'];
                }

        if (! empty($data['profile']['threeCurrentPositions']['values']))
            foreach ($data['profile']['threeCurrentPositions']['values'] as $work)
                if ((isset($work['company']['name'], $work['title'], $work['startDate']['year'])) && (! in_array($work['id'], $seen))) {
                    $data['_work'][] = [
                        'employer'   => $work['company']['name'],
                        'position'   => $work['title'],
                        'location'   => (isset($work['company']['id']) ? $this->_workLocation($work['company']['id'], $data) : null),
                        'start_date' => $work['startDate']['year'],
                        'end_date'   => (empty($work['endDate']['year']) ? null : $work['endDate']['year'])
                    ];
                    $seen[] = $work['id'];
                }

        if (! empty($data['profile']['threePastPositions']['values']))
            foreach ($data['profile']['threePastPositions']['values'] as $work)
                if ((isset($work['company']['name'], $work['title'], $work['startDate']['year'])) && (! in_array($work['id'], $seen))) {
                    $data['_work'][] = [
                        'employer'   => $work['company']['name'],
                        'position'   => $work['title'],
                        'location'   => (isset($work['company']['id']) ? $this->_workLocation($work['company']['id'], $data) : null),
                        'start_date' => $work['startDate']['year'],
                        'end_date'   => (empty($work['endDate']['year']) ? null : $work['endDate']['year'])
                    ];
                    $seen[] = $work['id'];
                }

        if (count($data['_work']))
            usort($data['_work'], function ($a, $b) {
                if ((empty($a['end_date'])) && (empty($b['end_date'])))
                    return $b['start_date'] - $a['start_date'];

                if (empty($a['end_date']))
                    return -1;

                if (empty($b['end_date']))
                    return 1;

                if ($a['start_date'] == $b['start_date'])
                    return $b['end_date'] - $a['end_date'];

                return $b['start_date'] - $a['start_date'];
            });

        return $data['_work'];
    }

    private function profile_url(&$data) {
        if (empty($data['profile']['publicProfileUrl']))
            return;

        return $data['profile']['publicProfileUrl'];
    }

    private function profile_picture(&$data) {
        if (empty($data['profile']['pictureUrls']['values'][0])) {
            if (empty($data['profile']['pictureUrl']))
                return;

            return $data['profile']['pictureUrl'];
        }

        return $data['profile']['pictureUrls']['values'][0];
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
        if ((empty($data['profile']['firstName'])) || (empty($data['profile']['lastName'])))
            return;

        return sprintf('%s %s', trim($data['profile']['firstName']), trim($data['profile']['lastName']));
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
        if ((empty($data['profile']['emailAddress'])) || (strpos($data['profile']['emailAddress'], '@') === false))
            return;

        return $data['profile']['emailAddress'];
    }

    private function email_username(&$data) {
        $email = $this->email_address($data);
        if (is_null($email))
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function first_phone(&$data, $type) {
        if (empty($data['profile']['phoneNumbers']['values'][0]['phoneNumber']))
            return;
        switch ($type) {
            case 'country':
                return Utils::getInstance()->phoneCountry($data['profile']['phoneNumbers']['values'][0]['phoneNumber']);
            case 'countrycode':
                return Utils::getInstance()->phoneCountryCode($data['profile']['phoneNumbers']['values'][0]['phoneNumber']);
            case 'number':
                return Utils::getInstance()->phoneNumber($data['profile']['phoneNumbers']['values'][0]['phoneNumber']);
            default:
                return;
        }
    }

    private function second_phone(&$data, $type) {
        if (empty($data['profile']['phoneNumbers']['values'][1]['phoneNumber']))
            return;

        switch ($type) {
            case 'country':
                return Utils::getInstance()->phoneCountry($data['profile']['phoneNumbers']['values'][1]['phoneNumber']);
            case 'countrycode':
                return Utils::getInstance()->phoneCountryCode($data['profile']['phoneNumbers']['values'][1]['phoneNumber']);
            case 'number':
                return Utils::getInstance()->phoneNumber($data['profile']['phoneNumbers']['values'][1]['phoneNumber']);
            default:
                return;
        }
    }

    private function school_friends(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = [];
        foreach ($data['profile']['educations']['values'] as $education)
            if (isset($education['schoolName']))
                $educations[] = $education['schoolName'];

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'])) && (in_array($education['schoolName'], $educations)))
                    $return++;
        }

        return $return;
    }

    private function num_coworkers(&$data) {
        if ((empty($data['profile']['positions']['values'])) || (empty($data['connections'])))
            return 0;

        $companies = [];
        foreach ($data['profile']['positions']['values'] as $company)
            if (isset($company['company']['id']))
                $companies[] = $company['company']['id'];

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['positions']['values']))
                continue;
            foreach ($connection['positions']['values'] as $position)
                if ((isset($position['company']['id'])) && (in_array($position['company']['id'], $companies)))
                    $return++;
        }

        return $return;
    }

    private function num_connections(&$data) {
        if (empty($data['connections']))
            return 0;

        return count($data['connections']);
    }

    private function num_companies(&$data) {
        if (empty($data['companies']))
            return 0;

        return count($data['companies']);
    }

    private function network_reach(&$data) {
        if (empty($data['network'][1]))
            return 0;

        return $data['network'][1];
    }

    private function num_positions(&$data) {
        if (empty($data['profile']['positions']['values']))
            return 0;

        return count($data['profile']['positions']['values']);
    }

    private function twitter_accounts(&$data) {
        if (empty($data['profile']['twitterAccounts']['values']))
            return 0;

        return count($data['profile']['twitterAccounts']['values']);
    }

    private function recommendations_received(&$data) {
        if (empty($data['profile']['recommendationsReceived']['values']))
            return 0;

        return count($data['profile']['recommendationsReceived']['values']);
    }

    private function birth(&$data, $field) {
        if (empty($data['profile']['dateOfBirth'][$field]))
            return 0;

        return intval($data['profile']['dateOfBirth'][$field]);
    }

    private function current_city_name(&$data) {
        if (empty($data['profile']['location']['name']))
            return;
        if (strpos($data['profile']['location']['name'], ',') === false)
            return trim(str_replace('Area', '', $data['profile']['location']['name']));
        $city = explode(',', $data['profile']['location']['name']);

        return trim(str_replace('Area', '', $city[0]));
    }

    private function current_region_name(&$data) {
        $cityName = $this->current_city_name($data);
        if (empty($cityName))
            return;

        return Utils::getInstance()->regionFromCity($cityName);
    }

    private function current_country_name(&$data) {
        if (empty($data['profile']['location']['country']['code']))
            return;

        return Utils::getInstance()->codeToCountry($data['profile']['location']['country']['code']);
    }

    private function top1_connections_city(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);

        return $cities[0];
    }

    private function top1_connections_country(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);

        return $countries[0];
    }

    private function top2_connections_city(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[1]))
            return;

        return $cities[1];
    }

    private function top2_connections_country(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[1]))
            return;

        return $countries[1];
    }

    private function top3_connections_city(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[2]))
            return;

        return $cities[2];
    }

    private function top3_connections_country(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[2]))
            return;

        return $countries[2];
    }

    private function top4_connections_city(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[3]))
            return;

        return $cities[3];
    }

    private function top4_connections_country(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[3]))
            return;

        return $countries[3];
    }

    private function top5_connections_city(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[4]))
            return;

        return $cities[4];
    }

    private function top5_connections_country(&$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[4]))
            return;

        return $countries[4];
    }

    private function first_most_recent_education(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['name']))
            return;

        return $educations[0]['name'];
    }

    private function second_most_recent_education(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['name']))
            return;

        return $educations[1]['name'];
    }

    private function third_most_recent_education(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['name']))
            return;

        return $educations[2]['name'];
    }

    private function first_most_recent_education_type(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['type']))
            return;

        return $educations[0]['type'];
    }

    private function second_most_recent_education_type(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['type']))
            return;

        return $educations[1]['type'];
    }

    private function third_most_recent_education_type(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['type']))
            return;

        return $educations[2]['type'];
    }

    private function first_most_recent_education_course(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['course']))
            return;

        return $educations[0]['course'];
    }

    private function second_most_recent_education_course(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['course']))
            return;

        return $educations[1]['course'];
    }

    private function third_most_recent_education_course(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['course']))
            return;

        return $educations[2]['course'];
    }

    private function first_most_recent_education_graduation_year(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['end_year']))
            return;

        return $educations[0]['end_year'];
    }

    private function second_most_recent_education_graduation_year(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['end_year']))
            return;

        return $educations[1]['end_year'];
    }

    private function third_most_recent_education_graduation_year(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['end_year']))
            return;

        return $educations[2]['end_year'];
    }

    private function first_most_recent_education_graduated(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['end_year']))
            return;

        return $educations[0]['end_year'] < date('Y');
    }

    private function second_most_recent_education_graduated(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['end_year']))
            return;

        return $educations[1]['end_year'] < date('Y');
    }

    private function third_most_recent_education_graduated(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['end_year']))
            return;

        return $educations[2]['end_year'] < date('Y');
    }

    private function num_friends_first_most_recent_education(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if (empty($educations[0]['name']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'])) && ($education['schoolName'] === $educations[0]['name'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_second_most_recent_education(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if (empty($educations[1]['name']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'])) && ($education['schoolName'] === $educations[1]['name'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_third_most_recent_education(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if (empty($educations[2]['name']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'])) && ($education['schoolName'] === $educations[2]['name'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_first_most_recent_education_same_graduation_year(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if ((empty($educations[0]['name'])) || (empty($educations[0]['end_year'])))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'], $education['endDate']['year'])) &&
                    ($education['schoolName'] === $educations[0]['name']) &&
                    ($education['endDate']['year'] == $educations[0]['end_year'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_second_most_recent_education_same_graduation_year(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if ((empty($educations[1]['name'])) || (empty($educations[1]['end_year'])))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'], $education['endDate']['year'])) &&
                    ($education['schoolName'] === $educations[1]['name']) &&
                    ($education['endDate']['year'] == $educations[1]['end_year'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_third_most_recent_education_same_graduation_year(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if ((empty($educations[2]['name'])) || (empty($educations[2]['end_year'])))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['schoolName'], $education['endDate']['year'])) &&
                    ($education['schoolName'] === $educations[2]['name']) &&
                    ($education['endDate']['year'] == $educations[2]['end_year'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_working_first_most_recent_education(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if (empty($educations[0]['name']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['positions']['values']))
                continue;
            foreach ($connection['positions']['values'] as $position)
                if ((isset($position['company']['name'])) && ($position['company']['name'] === $educations[0]['name'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_working_second_most_recent_education(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if (empty($educations[1]['name']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['positions']['values']))
                continue;
            foreach ($connection['positions']['values'] as $position)
                if ((isset($position['company']['name'])) && ($position['company']['name'] === $educations[1]['name'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_friends_working_third_most_recent_education(&$data) {
        if ((empty($data['profile']['educations']['values'])) || (empty($data['connections'])))
            return 0;

        $educations = $this->_education($data);
        if (empty($educations))
            return 0;

        if (empty($educations[2]['name']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['positions']['values']))
                continue;
            foreach ($connection['positions']['values'] as $position)
                if ((isset($position['company']['name'])) && ($position['company']['name'] === $educations[2]['name'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function num_student_friends(&$data) {
        if (empty($data['connections']))
            return 0;

        $connections = $this->_connections($data);
        $return      = 0;
        foreach ($connections as $connection) {
            if (empty($connection['educations']['values']))
                continue;
            foreach ($connection['educations']['values'] as $education)
                if ((isset($education['endDate']['year'])) && ($education['endDate']['year'] >= date('Y'))) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function is_student(&$data) {
        if (empty($data['profile']['educations']['values']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['end_year']))
            return 0;

        return $educations[0]['end_year'] >= date('Y');
    }

    private function is_student_age(&$data) {
        $birthYear = $this->birth($data, 'year');
        if (empty($birthYear))
            return;

        $age = (date('Y') - $birthYear);

        //from 10 to 18 for mid/high school
        //from 18 to 25 for college
        return ($age >= 10) && ($age <= 25);
    }

    private function first_most_recent_employer(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['employer']))
            return;

        return $works[0]['employer'];
    }

    private function second_most_recent_employer(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['employer']))
            return;

        return $works[1]['employer'];
    }

    private function third_most_recent_employer(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['employer']))
            return;

        return $works[2]['employer'];
    }

    private function fourth_most_recent_employer(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['employer']))
            return;

        return $works[3]['employer'];
    }

    private function fifth_most_recent_employer(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['employer']))
            return;

        return $works[4]['employer'];
    }

    private function first_most_recent_work_position(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['position']))
            return;

        return $works[0]['position'];
    }

    private function second_most_recent_work_position(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['position']))
            return;

        return $works[1]['position'];
    }

    private function third_most_recent_work_position(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['position']))
            return;

        return $works[2]['position'];
    }

    private function fourth_most_recent_work_position(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['position']))
            return;

        return $works[3]['position'];
    }

    private function fifth_most_recent_work_position(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['position']))
            return;

        return $works[4]['position'];
    }

    private function first_most_recent_work_location(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['location']))
            return;

        return $works[0]['location'];
    }

    private function second_most_recent_work_location(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['location']))
            return;

        return $works[1]['location'];
    }

    private function third_most_recent_work_location(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['location']))
            return;

        return $works[2]['location'];
    }

    private function fourth_most_recent_work_location(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['location']))
            return;

        return $works[3]['location'];
    }

    private function fifth_most_recent_work_location(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['location']))
            return;

        return $works[4]['location'];
    }

    private function first_most_recent_work_is_current(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]))
            return;

        return empty($works[0]['end_date']);
    }

    private function second_most_recent_work_is_current(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]))
            return;

        return empty($works[1]['end_date']);
    }

    private function third_most_recent_work_is_current(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]))
            return;

        return empty($works[2]['end_date']);
    }

    private function fourth_most_recent_work_is_current(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]))
            return;

        return empty($works[3]['end_date']);
    }

    private function fifth_most_recent_work_is_current(&$data) {
        if (empty($data['profile']['positions']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]))
            return;

        return empty($works[4]['end_date']);
    }

    public function analyze(array $data) : array {
        $facts                                                                    = [];
        $facts['isActive']                                                        = ! empty($data);
        $facts['profileURL']                                                      = $this->profile_url($data);
        $facts['profilePicture']                                                  = $this->profile_picture($data);
        $facts['isACommonName']                                                   = $this->is_common_name($data);
        $facts['isListedName']                                                    = $this->is_listed_name($data);
        $facts['isFantasyName']                                                   = $this->is_fantasy_name($data);
        $facts['isSanctionedName']                                                = $this->is_sanctioned_name($data);
        $facts['isPEPName']                                                       = $this->is_pep_name($data);
        $facts['isCelebrityName']                                                 = $this->is_celebrity_name($data);
        $facts['isSillyName']                                                     = $this->is_silly_name($data);
        $facts['nameGender']                                                      = $this->name_gender($data);
        $facts['fullName']                                                        = $this->full_name($data);
        $facts['firstName']                                                       = $this->first_name($data);
        $facts['firstNameInitial']                                                = $this->first_name_initial($data);
        $facts['middleName']                                                      = $this->middle_name($data);
        $facts['middleNameInitial']                                               = $this->middle_name_initial($data);
        $facts['lastName']                                                        = $this->last_name($data);
        $facts['lastNameInitial']                                                 = $this->last_name_initial($data);
        $facts['emailAddress']                                                    = $this->email_address($data);
        $facts['emailUsername']                                                   = $this->email_username($data);
        $facts['firstPhoneCountry']                                               = $this->first_phone($data, 'country');
        $facts['firstPhoneCountryCode']                                           = $this->first_phone($data, 'countrycode');
        $facts['firstPhoneNumber']                                                = $this->first_phone($data, 'number');
        $facts['secondPhoneCountry']                                              = $this->second_phone($data, 'country');
        $facts['secondPhoneCountryCode']                                          = $this->second_phone($data, 'countrycode');
        $facts['secondPhoneNumber']                                               = $this->second_phone($data, 'number');
        $facts['numOfSchoolFriends']                                              = $this->school_friends($data);
        $facts['numOfCoworkers']                                                  = $this->num_coworkers($data);
        $facts['numOfConnections']                                                = $this->num_connections($data);
        $facts['numOfCompanies']                                                  = $this->num_companies($data);
        $facts['networkReach']                                                    = $this->network_reach($data);
        $facts['numOfPositions']                                                  = $this->num_positions($data);
        $facts['numOfLinkedTwitterAccounts']                                      = $this->twitter_accounts($data);
        $facts['numOfRecommendationsReceived']                                    = $this->recommendations_received($data);
        $facts['birthDay']                                                        = $this->birth($data, 'day');
        $facts['birthMonth']                                                      = $this->birth($data, 'month');
        $facts['birthYear']                                                       = $this->birth($data, 'year');
        $facts['cityName']                                                        = $this->current_city_name($data);
        $facts['regionName']                                                      = $this->current_region_name($data);
        $facts['countryName']                                                     = $this->current_country_name($data);
        $facts['top1ConnectionsCity']                                             = $this->top1_connections_city($data);
        $facts['top1ConnectionsCountry']                                          = $this->top1_connections_country($data);
        $facts['top2ConnectionsCity']                                             = $this->top2_connections_city($data);
        $facts['top2ConnectionsCountry']                                          = $this->top2_connections_country($data);
        $facts['top3ConnectionsCity']                                             = $this->top3_connections_city($data);
        $facts['top3ConnectionsCountry']                                          = $this->top3_connections_country($data);
        $facts['top4ConnectionsCity']                                             = $this->top4_connections_city($data);
        $facts['top4ConnectionsCountry']                                          = $this->top4_connections_country($data);
        $facts['top5ConnectionsCity']                                             = $this->top5_connections_city($data);
        $facts['top5ConnectionsCountry']                                          = $this->top5_connections_country($data);
        $facts['firstMostRecentEducation']                                        = $this->first_most_recent_education($data);
        $facts['secondMostRecentEducation']                                       = $this->second_most_recent_education($data);
        $facts['thirdMostRecentEducation']                                        = $this->third_most_recent_education($data);
        $facts['firstMostRecentEducationType']                                    = $this->first_most_recent_education_type($data);
        $facts['secondMostRecentEducationType']                                   = $this->second_most_recent_education_type($data);
        $facts['thirdMostRecentEducationType']                                    = $this->third_most_recent_education_type($data);
        $facts['firstMostRecentEducationCourse']                                  = $this->first_most_recent_education_course($data);
        $facts['secondMostRecentEducationCourse']                                 = $this->second_most_recent_education_course($data);
        $facts['thirdMostRecentEducationCourse']                                  = $this->third_most_recent_education_course($data);
        $facts['firstMostRecentEducationGraduationYear']                          = $this->first_most_recent_education_graduation_year($data);
        $facts['secondMostRecentEducationGraduationYear']                         = $this->second_most_recent_education_graduation_year($data);
        $facts['thirdMostRecentEducationGraduationYear']                          = $this->third_most_recent_education_graduation_year($data);
        $facts['isFirstMostRecentEducationGraduated']                             = $this->first_most_recent_education_graduated($data);
        $facts['isSecondMostRecentEducationGraduated']                            = $this->second_most_recent_education_graduated($data);
        $facts['isThirdMostRecentEducationGraduated']                             = $this->third_most_recent_education_graduated($data);
        $facts['numOfFriendsFromFirstMostRecentEducation']                        = $this->num_friends_first_most_recent_education($data);
        $facts['numOfFriendsFromSecondMostRecentEducation']                       = $this->num_friends_second_most_recent_education($data);
        $facts['numOfFriendsFromThirdMostRecentEducation']                        = $this->num_friends_third_most_recent_education($data);
        $facts['numOfFriendsFromFirstMostRecentEducationWithSameGraduationYear']  = $this->num_friends_first_most_recent_education_same_graduation_year($data);
        $facts['numOfFriendsFromSecondMostRecentEducationWithSameGraduationYear'] = $this->num_friends_second_most_recent_education_same_graduation_year($data);
        $facts['numOfFriendsFromThirdMostRecentEducationWithSameGraduationYear']  = $this->num_friends_third_most_recent_education_same_graduation_year($data);
        $facts['numOfFriendsWorkingAtFirstMostRecentEducation']                   = $this->num_friends_working_first_most_recent_education($data);
        $facts['numOfFriendsWorkingAtSecondMostRecentEducation']                  = $this->num_friends_working_second_most_recent_education($data);
        $facts['numOfFriendsWorkingAtThirdMostRecentEducation']                   = $this->num_friends_working_third_most_recent_education($data);
        $facts['numOfStudentFriends']                                             = $this->num_student_friends($data);
        $facts['isAStudent']                                                      = $this->is_student($data);
        $facts['isWithinStudentAge']                                              = $this->is_student_age($data);
        $facts['firstMostRecentEmployer']                                         = $this->first_most_recent_employer($data);
        $facts['secondMostRecentEmployer']                                        = $this->second_most_recent_employer($data);
        $facts['thirdMostRecentEmployer']                                         = $this->third_most_recent_employer($data);
        $facts['fourthMostRecentEmployer']                                        = $this->fourth_most_recent_employer($data);
        $facts['fifthMostRecentEmployer']                                         = $this->fifth_most_recent_employer($data);
        $facts['firstMostRecentWorkPosition']                                     = $this->first_most_recent_work_position($data);
        $facts['secondMostRecentWorkPosition']                                    = $this->second_most_recent_work_position($data);
        $facts['thirdMostRecentWorkPosition']                                     = $this->third_most_recent_work_position($data);
        $facts['fourthMostRecentWorkPosition']                                    = $this->fourth_most_recent_work_position($data);
        $facts['fifthMostRecentWorkPosition']                                     = $this->fifth_most_recent_work_position($data);
        $facts['firstMostRecentWorkLocation']                                     = $this->first_most_recent_work_location($data);
        $facts['secondMostRecentWorkLocation']                                    = $this->second_most_recent_work_location($data);
        $facts['thirdMostRecentWorkLocation']                                     = $this->third_most_recent_work_location($data);
        $facts['fourthMostRecentWorkLocation']                                    = $this->fourth_most_recent_work_location($data);
        $facts['fifthMostRecentWorkLocation']                                     = $this->fifth_most_recent_work_location($data);
        $facts['firstMostRecentWorkIsCurrent']                                    = $this->first_most_recent_work_is_current($data);
        $facts['secondMostRecentWorkIsCurrent']                                   = $this->second_most_recent_work_is_current($data);
        $facts['thirdMostRecentWorkIsCurrent']                                    = $this->third_most_recent_work_is_current($data);
        $facts['fourthMostRecentWorkIsCurrent']                                   = $this->fourth_most_recent_work_is_current($data);
        $facts['fifthMostRecentWorkIsCurrent']                                    = $this->fifth_most_recent_work_is_current($data);

        return $facts;
    }

}
