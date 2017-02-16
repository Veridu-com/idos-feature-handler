<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Utils;

/**
 * This class is responsible for extracting the features from the google raw data that we got through the scraping process.
 * Each method in this class extracts a single feature from the raw data and returns this feature. The method called 'analyze'
 * will return an array with all the features that were extracted from the google.
 */
final class Google extends AbstractExtractor {
    private function googleCircles($data) {
        //@FIXME
        return [];
        /*$mongo = new Mongo;
        $circles = $mongo->selectCollection('google', 'circles')->findOne(array('id' => $profile_id));
        if (empty($circles['list'])) {
            $mongo->close();
            return array();
        }

        $return = array();
        $docs = $mongo->selectCollection('google', 'profile')->find(array(
            'id' => array(
                '$in' => $circles['list']
            )
        ));
        foreach ($docs as $doc) {
            unset($doc['_id']);
            $key = array_search($doc['id'], $circles['list']);
            if ($key !== false)
                unset($circles['list'][$key]);
            $return[] = $doc;
        }
        if (empty($circles['list']))
            return $return;
        $docs = $mongo->selectCollection('google', 'plus')->find(array(
            'id' => array(
                '$in' => array_values($circles['list'])
            )
        ));
        foreach ($docs as $doc) {
            unset($doc['_id']);
            $return[] = $doc;
        }
        $mongo->close();
        return $return;*/
    }

    public function googleGraph($data) {
        //@FIXME
        return [];

        $circles = $this->googleCircles($data);
        if (empty($circles))
            return [];

        $return = [];
        foreach ($circles as $circle) {
            if (! empty($circle['displayName']))
                $return[] = Matcher::normalize_string($circle['displayName']);
            elseif (! empty($circle['name'])) {
                if (is_array($circle['name']))
                    $return[] = Matcher::normalize_string(implode(' ', $circle['name']));
                else
                    $return[] = Matcher::normalize_string($circle['name']);
            }
        }

        return array_unique($return);
    }

    private function _circles(&$data) {
        if (isset($data['_circles']))
            return $data['_circles'];
        $data['_circles'] = $this->googleCircles($data);

        return $data['_circles'];
    }

    private function _education(&$data) {
        if (isset($data['_education']))
            return $data['_education'];

        if (empty($data['plus']['organizations']))
            return [];

        $data['_education'] = [];
        foreach ($data['plus']['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type'], $organization['startDate'], $organization['endDate'])) && ($organization['type'] === 'school'))
                $data['_education'][] = [
                    'name'       => $organization['name'],
                    'start_year' => $organization['startDate'],
                    'end_year'   => $organization['endDate'],
                    'course'     => (isset($organization['title']) ? $organization['title'] : null)
                ];

        if (count($data['_education']))
            usort(
                $data['_education'], function ($a, $b) {
                    if ($b['start_year'] == $a['start_year'])
                    return $b['end_year'] - $a['end_year'];

                    return $b['start_year'] - $a['start_year'];
                }
            );

        return $data['_education'];
    }

    private function _work(&$data) {
        if (isset($data['_work']))
            return $data['_work'];

        if (empty($data['plus']['organizations']))
            return [];

        $data['_work'] = [];
        foreach ($data['plus']['organizations'] as $organization)
            if ((isset($organization['name'], $organization['title'], $organization['type'], $organization['startDate'])) && ($organization['type'] === 'work'))
                $data['_work'][] = [
                    'employer'   => $organization['name'],
                    'position'   => $organization['title'],
                    'start_date' => $organization['startDate'],
                    'end_date'   => (empty($organization['endDate']) ? null : $organization['endDate'])
                ];

        if (count($data['_work']))
            usort(
                $data['_work'], function ($a, $b) {
                    if ((empty($a['end_date'])) && (empty($b['end_date'])))
                    return $b['start_date'] - $a['start_date'];

                    if (empty($a['end_date']))
                    return -1;

                    if (empty($b['end_date']))
                    return 1;

                    if ($a['start_date'] == $b['start_date'])
                    return $b['end_date'] - $a['end_date'];

                    return $b['start_date'] - $a['start_date'];
                }
            );

        return $data['_work'];
    }

    private function profile_id(&$data) {
        if (empty($data['profile']['id'])) {
            return;
        }

        return $data['profile']['id'];
    }

    private function profile_picture(&$data) {
        if (empty($data['profile']['picture'])) {
            if (empty($data['plus']['image']['url']))
                return;

            return $data['plus']['image']['url'];
        }

        return $data['profile']['picture'];
    }

    private function profile_url(&$data) {
        if (empty($data['profile']['id'])) {
            return;
        }

        return sprintf('https://plus.google.com/%s', $data['profile']['id']);
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

    private function profile_gender(&$data) {
        if (empty($data['profile']['gender']))
            return;

        return strtolower($data['profile']['gender']);
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

    private function num_circles(&$data) {
        if (empty($data['circles']))
            return 0;

        return count($data['circles']);
    }

    private function school_friends(&$data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;
        $educations = [];
        $colleagues = [];
        foreach ($data['plus']['organizations'] as $organization)
            if (($organization['type'] === 'school') && (! empty($organization['name'])))
                $educations[] = $organization['name'];

        $circles = $this->_circles($data);
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
                if (($organization['type'] === 'school') && (! empty($organization['name'])) && (in_array($organization['name'], $educations)))
                    $colleagues[$circle['id']] = true;
        }

        return count($colleagues);
    }

    private function num_coworkers(&$data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $companies = [];
        $coworkers = [];
        foreach ($data['plus']['organizations'] as $organization)
            if (($organization['type'] === 'work') && (! empty($organization['name'])))
                $companies[] = $organization['name'];

        $circles = $this->_circles($data);
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
                if (($organization['type'] === 'work') && (! empty($organization['name'])) && (in_array($organization['name'], $companies)))
                    $coworkers[$circle['id']] = true;
        }

        return count($coworkers);
    }

    private function avg_activities_week(&$data) {
        if (empty($data['activities']))
            return;

        $activities = [];
        foreach ($data['activities'] as $activity) {
            if (empty($activity['published']))
                $ts = strtotime($activity['updated']);
            else
                $ts = strtotime($activity['published']);
            if ($ts === false)
                continue;
            if (! isset($activities[date('Y', $ts)]))
                $activities[date('Y', $ts)] = [];
            if (! isset($activities[date('Y', $ts)][date('n', $ts)]))
                $activities[date('Y', $ts)][date('n', $ts)] = 0;
            $activities[date('Y', $ts)][date('n', $ts)]++;
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($activities as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month']))
                    break;
                if (isset($months[$i]))
                    $months[$i] = round($months[$i] / 4, 2);
                else
                    $months[$i] = 0;
            }

            ksort($months);
        }

        ksort($activities);

        return $activities;
    }

    private function avg_replies_week(&$data) {
        if (empty($data['activities']))
            return;

        $replies = [];
        foreach ($data['activities'] as $activity) {
            if (empty($activity['published']))
                $ts = strtotime($activity['updated']);
            else
                $ts = strtotime($activity['published']);
            if ($ts === false)
                continue;
            if ($activity['object']['replies']['totalItems']) {
                if (! isset($replies[date('Y', $ts)]))
                    $replies[date('Y', $ts)] = [];
                if (! isset($replies[date('Y', $ts)][date('n', $ts)]))
                    $replies[date('Y', $ts)][date('n', $ts)] = 0;
                $replies[date('Y', $ts)][date('n', $ts)] += $activity['object']['replies']['totalItems'];
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($replies as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month']))
                    break;
                if (isset($months[$i]))
                    $months[$i] = round($months[$i] / 4, 2);
                else
                    $months[$i] = 0;
            }

            ksort($months);
        }

        ksort($replies);

        return $replies;
    }

    private function avg_plusoners_week(&$data) {
        if (empty($data['activities']))
            return;

        $plusoners = [];
        foreach ($data['activities'] as $activity) {
            if (empty($activity['published']))
                $ts = strtotime($activity['updated']);
            else
                $ts = strtotime($activity['published']);
            if ($ts === false)
                continue;
            if ($activity['object']['plusoners']['totalItems']) {
                if (! isset($plusoners[date('Y', $ts)]))
                    $plusoners[date('Y', $ts)] = [];
                if (! isset($plusoners[date('Y', $ts)][date('n', $ts)]))
                    $plusoners[date('Y', $ts)][date('n', $ts)] = 0;
                $plusoners[date('Y', $ts)][date('n', $ts)] += $activity['object']['plusoners']['totalItems'];
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($plusoners as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month']))
                    break;
                if (isset($months[$i]))
                    $months[$i] = round($months[$i] / 4, 2);
                else
                    $months[$i] = 0;
            }

            ksort($months);
        }

        ksort($plusoners);

        return $plusoners;
    }

    private function avg_resharers_week(&$data) {
        if (empty($data['activities']))
            return;

        $resharers = [];
        foreach ($data['activities'] as $activity) {
            if (empty($activity['published']))
                $ts = strtotime($activity['updated']);
            else
                $ts = strtotime($activity['published']);
            if ($ts === false)
                continue;
            if ($activity['object']['resharers']['totalItems']) {
                if (! isset($resharers[date('Y', $ts)]))
                    $resharers[date('Y', $ts)] = [];
                if (! isset($resharers[date('Y', $ts)][date('n', $ts)]))
                    $resharers[date('Y', $ts)][date('n', $ts)] = 0;
                $resharers[date('Y', $ts)][date('n', $ts)] += $activity['object']['resharers']['totalItems'];
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($resharers as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month']))
                    break;
                if (isset($months[$i]))
                    $months[$i] = round($months[$i] / 4, 2);
                else
                    $months[$i] = 0;
            }

            ksort($months);
        }

        ksort($resharers);

        return $resharers;
    }

    private function profile_age(&$data) {
        if (empty($data['activities']))
            return;

        $age = null;
        foreach ($data['activities'] as $activity) {
            if (empty($activity['published']))
                $ts = strtotime($activity['updated']);
            else
                $ts = strtotime($activity['published']);
            if ($ts === false)
                continue;
            if ((is_null($age)) || ($ts < $age))
                $age = $ts;
        }

        return $age;
    }

    private function current_city_name(&$data) {
        if (empty($data['plus']['placesLived']))
            return;

        $i = 0;
        do {
            $i++;
        } while ((isset($data['plus']['placesLived'][$i])) && (empty($data['plus']['placesLived'][$i]['primary'])));
        if (empty($data['plus']['placesLived'][$i]['value']))
            $i = 0;
        if (strpos($data['plus']['placesLived'][$i]['value'], ',') === false) {
            if (strpos($data['plus']['placesLived'][$i]['value'], '-') === false)
                return $data['plus']['placesLived'][$i]['value'];
            $city = explode('-', $data['plus']['placesLived'][$i]['value']);

            return trim($city[0]);
        }

        $city = explode(',', $data['plus']['placesLived'][$i]['value']);

        return trim($city[0]);
    }

    private function current_region_name(&$data) {
        $cityName = $this->current_city_name($data);
        if (empty($cityName))
            return;

        return Utils::getInstance()->regionFromCity($cityName);
    }

    private function current_country_name(&$data) {
        $cityName = $this->current_city_name($data);
        if (empty($cityName))
            return;

        return Utils::getInstance()->countryFromCity($cityName);
    }

    private function first_most_recent_education($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['name']))
            return;

        return $educations[0]['name'];
    }

    private function second_most_recent_education($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['name']))
            return;

        return $educations[1]['name'];
    }

    private function third_most_recent_education($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['name']))
            return;

        return $educations[2]['name'];
    }

    private function first_most_recent_education_course($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['course']))
            return;

        return $educations[0]['course'];
    }

    private function second_most_recent_education_course($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['course']))
            return;

        return $educations[1]['course'];
    }

    private function third_most_recent_education_course($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['course']))
            return;

        return $educations[2]['course'];
    }

    private function first_most_recent_education_graduation_year($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['end_year']))
            return;

        return $educations[0]['end_year'];
    }

    private function second_most_recent_education_graduation_year($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['end_year']))
            return;

        return $educations[1]['end_year'];
    }

    private function third_most_recent_education_graduation_year($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['end_year']))
            return;

        return $educations[2]['end_year'];
    }

    private function first_most_recent_education_graduated($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['end_year']))
            return;

        return $educations[0]['end_year'] < date('Y');
    }

    private function second_most_recent_education_graduated($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['end_year']))
            return;

        return $educations[1]['end_year'] < date('Y');
    }

    private function third_most_recent_education_graduated($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['end_year']))
            return;

        return $educations[2]['end_year'] < date('Y');
    }

    private function num_friends_first_most_recent_education($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[0]['name']))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type']))
                && ($organization['type'] === 'school')
                && ($organization['name'] === $educations[0]['name'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_friends_second_most_recent_education($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[1]['name']))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type']))
                && ($organization['type'] === 'school')
                && ($organization['name'] === $educations[1]['name'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }
    private function num_friends_third_most_recent_education($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[2]['name']))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type']))
                && ($organization['type'] === 'school')
                && ($organization['name'] === $educations[2]['name'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_friends_first_most_recent_education_same_graduation_year($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if ((empty($educations[0]['name'])) || (empty($educations[0]['end_year'])))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type'], $organization['endDate']))
                && ($organization['type'] === 'school')
                && ($organization['name'] === $educations[0]['name'])
                && ($organization['endDate'] == $educations[0]['end_year'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }
    private function num_friends_second_most_recent_education_same_graduation_year($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if ((empty($educations[1]['name'])) || (empty($educations[1]['end_year'])))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type'], $organization['endDate']))
                && ($organization['type'] === 'school')
                && ($organization['name'] === $educations[1]['name'])
                && ($organization['endDate'] == $educations[1]['year'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_friends_third_most_recent_education_same_graduation_year($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if ((empty($educations[2]['name'])) || (empty($educations[2]['year'])))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type'], $organization['endDate']))
                && ($organization['type'] === 'school')
                && ($organization['name'] === $educations[2]['name'])
                && ($organization['endDate'] == $educations[2]['year'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_friends_working_first_most_recent_education($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[0]['name']))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type']))
                && ($organization['type'] === 'work')
                && ($organization['name'] === $educations[0]['name'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_friends_working_second_most_recent_education($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[1]['name']))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type']))
                && ($organization['type'] === 'work')
                && ($organization['name'] === $educations[1]['name'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_friends_working_third_most_recent_education($data) {
        if ((empty($data['plus']['organizations'])) || (empty($data['circles'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[2]['name']))
            return 0;

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['name'], $organization['type']))
                && ($organization['type'] === 'work')
                && ($organization['name'] === $educations[2]['name'])
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function num_student_friends($data) {
        if (empty($data['circles']))
            return 0;

        $year = date('Y');

        $circles = $this->_circles($data);
        $return  = 0;
        foreach ($circles as $circle) {
            if (empty($circle['organizations']))
                continue;
            foreach ($circle['organizations'] as $organization)
            if ((isset($organization['type'], $organization['endDate']))
                && ($organization['type'] === 'school')
                && ($organization['endDate'] >= $year)
            ) {
                $return++;
                break;
            }
        }

        return $return;
    }

    private function is_student($data) {
        if (empty($data['plus']['organizations']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['end_year']))
            return false;

        return $educations[0]['end_year'] >= date('Y');
    }

    private function first_most_recent_employer(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['employer']))
            return;

        return $works[0]['employer'];
    }

    private function second_most_recent_employer(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['employer']))
            return;

        return $works[1]['employer'];
    }

    private function third_most_recent_employer(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['employer']))
            return;

        return $works[2]['employer'];
    }

    private function fourth_most_recent_employer(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['employer']))
            return;

        return $works[3]['employer'];
    }

    private function fifth_most_recent_employer(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['employer']))
            return;

        return $works[4]['employer'];
    }

    private function first_most_recent_work_position(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['position']))
            return;

        return $works[0]['position'];
    }

    private function second_most_recent_work_position(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['position']))
            return;

        return $works[1]['position'];
    }

    private function third_most_recent_work_position(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['position']))
            return;

        return $works[2]['position'];
    }

    private function fourth_most_recent_work_position(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['position']))
            return;

        return $works[3]['position'];
    }

    private function fifth_most_recent_work_position(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['position']))
            return;

        return $works[4]['position'];
    }

    private function first_most_recent_work_is_current(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]))
            return;

        return empty($works[0]['end_date']);
    }

    private function second_most_recent_work_is_current(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]))
            return;

        return empty($works[1]['end_date']);
    }

    private function third_most_recent_work_is_current(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]))
            return;

        return empty($works[2]['end_date']);
    }

    private function fourth_most_recent_work_is_current(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]))
            return;

        return empty($works[3]['end_date']);
    }

    private function fifth_most_recent_work_is_current(&$data) {
        if (empty($data['plus']['organizations']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]))
            return;

        return empty($works[4]['end_date']);
    }

    private function num_gmail_messages(&$data) {
        if (empty($data['profile_gmail']))
            return 0;

        return $data['profile_gmail']['messagesTotal'];
    }

    private function num_gmail_inbox_messages(&$data) {
        if (empty($data['labels']))
            return 0;
        $count = 0;
        foreach ($data['labels'] as $label)
            if ($label['id'] === 'INBOX')
                $count += $label['messagesTotal'];

        return $count;
    }

    private function num_gmail_contacts(&$data) {
        if(empty($data['contacts']))
            return 0;

        return count($data['contacts']);
    }

    private function num_gmail_sent_messages(&$data) {
        if (empty($data['labels']))
            return 0;
        $count = 0;
        foreach ($data['labels'] as $label)
            if ($label['id'] === 'SENT')
                $count += $label['messagesTotal'];

        return $count;
    }

    private function num_gmail_labels(&$data) {
        if (empty($data['labels']))
            return 0;

        return count($data['labels']);
    }

    public function analyze(array $data) : array {
        return [
            'isActive'                                                        => ! empty($data),
            'profileId'                                                       => $this->profile_id($data),
            'profilePicture'                                                  => $this->profile_picture($data),
            'profileURL'                                                      => $this->profile_url($data),
            'isACommonName'                                                   => $this->is_common_name($data),
            'isListedName'                                                    => $this->is_listed_name($data),
            'isFantasyName'                                                   => $this->is_fantasy_name($data),
            'isSanctionedName'                                                => $this->is_sanctioned_name($data),
            'isPEPName'                                                       => $this->is_pep_name($data),
            'isCelebrityName'                                                 => $this->is_celebrity_name($data),
            'isSillyName'                                                     => $this->is_silly_name($data),
            'nameGender'                                                      => $this->name_gender($data),
            'fullName'                                                        => $this->full_name($data),
            'firstName'                                                       => $this->first_name($data),
            'firstNameInitial'                                                => $this->first_name_initial($data),
            'middleName'                                                      => $this->middle_name($data),
            'middleNameInitial'                                               => $this->middle_name_initial($data),
            'lastName'                                                        => $this->last_name($data),
            'lastNameInitial'                                                 => $this->last_name_initial($data),
            'profileGender'                                                   => $this->profile_gender($data),
            'emailAddress'                                                    => $this->email_address($data),
            'emailUsername'                                                   => $this->email_username($data),
            'numOfCircles'                                                    => $this->num_circles($data),
            'numOfSchoolFriends'                                              => $this->school_friends($data),
            'numOfCoworkers'                                                  => $this->num_coworkers($data),
            'avgActivitiesPerWeek'                                            => $this->avg_activities_week($data),
            'avgRepliesPerWeek'                                               => $this->avg_replies_week($data),
            'avgPlusonersPerWeek'                                             => $this->avg_plusoners_week($data),
            'avgResharersPerWeek'                                             => $this->avg_resharers_week($data),
            'profileAge'                                                      => $this->profile_age($data),
            'currentCityName'                                                 => $this->current_city_name($data),
            'currentRegionName'                                               => $this->current_region_name($data),
            'currentCountryName'                                              => $this->current_country_name($data),
            'firstMostRecentEducation'                                        => $this->first_most_recent_education($data),
            'secondMostRecentEducation'                                       => $this->second_most_recent_education($data),
            'thirdMostRecentEducation'                                        => $this->third_most_recent_education($data),
            'firstMostRecentEducationCourse'                                  => $this->first_most_recent_education_course($data),
            'secondMostRecentEducationCourse'                                 => $this->second_most_recent_education_course($data),
            'thirdMostRecentEducationCourse'                                  => $this->third_most_recent_education_course($data),
            'firstMostRecentEducationGraduationYear'                          => $this->first_most_recent_education_graduation_year($data),
            'secondMostRecentEducationGraduationYear'                         => $this->second_most_recent_education_graduation_year($data),
            'thirdMostRecentEducationGraduationYear'                          => $this->third_most_recent_education_graduation_year($data),
            'isFirstMostRecentEducationGraduated'                             => $this->first_most_recent_education_graduated($data),
            'isSecondMostRecentEducationGraduated'                            => $this->second_most_recent_education_graduated($data),
            'isThirdMostRecentEducationGraduated'                             => $this->third_most_recent_education_graduated($data),
            'numOfFriendsFromFirstMostRecentEducation'                        => $this->num_friends_first_most_recent_education($data),
            'numOfFriendsFromSecondMostRecentEducation'                       => $this->num_friends_second_most_recent_education($data),
            'numOfFriendsFromThirdMostRecentEducation'                        => $this->num_friends_third_most_recent_education($data),
            'numOfFriendsFromFirstMostRecentEducationWithSameGraduationYear'  => $this->num_friends_first_most_recent_education_same_graduation_year($data),
            'numOfFriendsFromSecondMostRecentEducationWithSameGraduationYear' => $this->num_friends_second_most_recent_education_same_graduation_year($data),
            'numOfFriendsFromThirdMostRecentEducationWithSameGraduationYear'  => $this->num_friends_third_most_recent_education_same_graduation_year($data),
            'numOfFriendsWorkingAtFirstMostRecentEducation'                   => $this->num_friends_working_first_most_recent_education($data),
            'numOfFriendsWorkingAtSecondMostRecentEducation'                  => $this->num_friends_working_second_most_recent_education($data),
            'numOfFriendsWorkingAtThirdMostRecentEducation'                   => $this->num_friends_working_third_most_recent_education($data),
            'numOfStudentFriends'                                             => $this->num_student_friends($data),
            'isAStudent'                                                      => $this->is_student($data),
            'firstMostRecentEmployer'                                         => $this->first_most_recent_employer($data),
            'secondMostRecentEmployer'                                        => $this->second_most_recent_employer($data),
            'thirdMostRecentEmployer'                                         => $this->third_most_recent_employer($data),
            'fourthMostRecentEmployer'                                        => $this->fourth_most_recent_employer($data),
            'fifthMostRecentEmployer'                                         => $this->fifth_most_recent_employer($data),
            'firstMostRecentWorkPosition'                                     => $this->first_most_recent_work_position($data),
            'secondMostRecentWorkPosition'                                    => $this->second_most_recent_work_position($data),
            'thirdMostRecentWorkPosition'                                     => $this->third_most_recent_work_position($data),
            'fourthMostRecentWorkPosition'                                    => $this->fourth_most_recent_work_position($data),
            'fifthMostRecentWorkPosition'                                     => $this->fifth_most_recent_work_position($data),
            'firstMostRecentWorkIsCurrent'                                    => $this->first_most_recent_work_is_current($data),
            'secondMostRecentWorkIsCurrent'                                   => $this->second_most_recent_work_is_current($data),
            'thirdMostRecentWorkIsCurrent'                                    => $this->third_most_recent_work_is_current($data),
            'fourthMostRecentWorkIsCurrent'                                   => $this->fourth_most_recent_work_is_current($data),
            'fifthMostRecentWorkIsCurrent'                                    => $this->fifth_most_recent_work_is_current($data),
            'numGmailContacts'                                                => $this->num_gmail_contacts($data),
            'numGmailMessages'                                                => $this->num_gmail_messages($data),
            'numGmailInboxMessages'                                           => $this->num_gmail_inbox_messages($data),
            'numGmailSentMessages'                                            => $this->num_gmail_sent_messages($data),
            'numGmailLabels'                                                  => $this->num_gmail_labels($data)
        ];
    }
}
