<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Utils;

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

    private function profile_picture(&$data) {
        if (empty($data['profile']['picture'])) {
            if (empty($data['plus']['image']['url']))
                return;

            return $data['plus']['image']['url'];
        }

        return $data['profile']['picture'];
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
        $facts                                                                    = [];
        $facts['isActive']                                                        = ! empty($data);
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
        $facts['profileGender']                                                   = $this->profile_gender($data);
        $facts['emailAddress']                                                    = $this->email_address($data);
        $facts['emailUsername']                                                   = $this->email_username($data);
        $facts['numOfCircles']                                                    = $this->num_circles($data);
        $facts['numOfSchoolFriends']                                              = $this->school_friends($data);
        $facts['numOfCoworkers']                                                  = $this->num_coworkers($data);
        $facts['avgActivitiesPerWeek']                                            = $this->avg_activities_week($data);
        $facts['avgRepliesPerWeek']                                               = $this->avg_replies_week($data);
        $facts['avgPlusonersPerWeek']                                             = $this->avg_plusoners_week($data);
        $facts['avgResharersPerWeek']                                             = $this->avg_resharers_week($data);
        $facts['profileAge']                                                      = $this->profile_age($data);
        $facts['currentCityName']                                                 = $this->current_city_name($data);
        $facts['currentRegionName']                                               = $this->current_region_name($data);
        $facts['currentCountryName']                                              = $this->current_country_name($data);
        $facts['firstMostRecentEducation']                                        = $this->first_most_recent_education($data);
        $facts['secondMostRecentEducation']                                       = $this->second_most_recent_education($data);
        $facts['thirdMostRecentEducation']                                        = $this->third_most_recent_education($data);
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
        $facts['firstMostRecentWorkIsCurrent']                                    = $this->first_most_recent_work_is_current($data);
        $facts['secondMostRecentWorkIsCurrent']                                   = $this->second_most_recent_work_is_current($data);
        $facts['thirdMostRecentWorkIsCurrent']                                    = $this->third_most_recent_work_is_current($data);
        $facts['fourthMostRecentWorkIsCurrent']                                   = $this->fourth_most_recent_work_is_current($data);
        $facts['fifthMostRecentWorkIsCurrent']                                    = $this->fifth_most_recent_work_is_current($data);
        $facts['numGmailContacts']                                                = $this->num_gmail_contacts($data);
        $facts['numGmailMessages']                                                = $this->num_gmail_messages($data);
        $facts['numGmailInboxMessages']                                           = $this->num_gmail_inbox_messages($data);
        $facts['numGmailSentMessages']                                            = $this->num_gmail_sent_messages($data);
        $facts['numGmailLabels']                                                  = $this->num_gmail_labels($data);

        return $facts;
    }
}
