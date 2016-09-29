<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Facebook extends AbstractExtractor {
    private function _graph(array &$data) {
        if (isset($data['_graph'])) {
            return $data['_graph'];
        }

        $graph = [];
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property) {
            if (empty($data[$property])) {
                continue;
            }

            foreach ($data[$property] as $item) {
                $graph[$item['from']['name']] = 0;
                if (isset($item['tags']['data'])) {
                    foreach ($item['tags']['data'] as $tag) {
                        if (isset($tag['name'])) {
                            $graph[$tag['name']] = 0;
                        }
                    }
                }

                if (isset($item['comments']['data'])) {
                    foreach ($item['comments']['data'] as $comment) {
                        if (isset($comment['from']['name'])) {
                            $graph[$comment['from']['name']] = 0;
                        }
                    }
                }

                if (isset($item['likes']['data'])) {
                    foreach ($item['likes']['data'] as $like) {
                        if (isset($like['name'])) {
                            $graph[$like['name']] = 0;
                        }
                    }
                }
            }
        }

        if (isset($data['profile']['first_name'], $data['profile']['last_name'])) {
            unset($graph["{$data['profile']['first_name']} {$data['profile']['last_name']}"]);
        }

        $return = [];
        foreach (array_keys($graph) as $friend) {
            $return[] = Matcher::normalize_string($friend);
        }

        if (empty($data['friends'])) {
            return $return;
        }

        $friends = $data['friends'];
        foreach ($friends as $friend) {
            if ((empty($friend['first_name'])) && (empty($friend['last_name']))) {
                continue;
            }

            $return[] = Matcher::normalize_string(
                sprintf(
                    '%s %s',
                    trim($friend['first_name']),
                    trim($friend['last_name'])
                )
            );
        }

        return array_unique($return);
    }

    private function _age_distribution(array &$data) {
        if (isset($data['_age_distribution']))
            return $data['_age_distribution'];
        $years   = [];

        if (empty($data['friends'])) {
            return $years;
        }

        $friends = $data['friends'];
        foreach ($friends as $friend) {
            if (empty($friend['birthday']))
                continue;
            if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
                if (! isset($years[$matches[2]]))
                    $years[$matches[2]] = 0;
                $years[$matches[2]]++;
            }
        }
        arsort($years);
        $data['_age_distribution'] = $years;

        return $years;
    }

    private function _location_distribution(array &$data) {
        if (isset($data['_location_distribution']))
            return $data['_location_distribution'];

        $location = [
            'city'    => [],
            'country' => []
        ];

        if (empty($data['friends'])) {
            return $location;
        }

        $friends = $data['friends'];
        // $utils = Utils::getInstance();
        foreach ($friends as $friend) {
            if (empty($friend['location']['name']))
                continue;

            if (strpos($friend['location']['name'], ',') === false) {
                $city = $friend['location']['name'];
                // $country = $utils->countryFromCity($friend['location']['name']);
                $country = null;
            } else {
                $name    = explode(',', $friend['location']['name']);
                $city    = trim($name[0]);
                $country = trim(array_pop($name));
            }

            if (! empty($city)) {
                if (! isset($location['city'][$city]))
                    $location['city'][$city] = 0;
                $location['city'][$city]++;
            }

            if (! empty($country)) {
                if (! isset($location['country'][$country]))
                    $location['country'][$country] = 0;
                $location['country'][$country]++;
            }

        }

        arsort($location['city']);
        arsort($location['country']);
        $data['_location_distribution'] = $location;

        return $location;
    }

    private function _education(array &$data) {
        if (isset($data['_education']))
            return $data['_education'];

        if (empty($data['profile']['education']))
            return [];

        $data['_education'] = [];

        foreach ($data['profile']['education'] as $education)
            if (isset($education['school']['id'], $education['school']['name'], $education['year']['name'])) {
                $data['_education'][] = [
                    'id'     => $education['school']['id'],
                    'name'   => $education['school']['name'],
                    'year'   => $education['year']['name'],
                    'type'   => (isset($education['type']) ? $education['type'] : null),
                    'course' => (isset($education['concentration'][0]['name']) ? $education['concentration'][0]['name'] : null)
                ];
            }

        if (count($data['_education']))
            usort($data['_education'], function ($a, $b) {
                return $b['year'] - $a['year'];
            });

        return $data['_education'];
    }

    private function _work(array &$data) {
        if (isset($data['_work']))
            return $data['_work'];

        if (empty($data['profile']['work']))
            return [];

        $data['_work'] = [];

        foreach ($data['profile']['work'] as $work)
            if (isset($work['employer']['name'], $work['position']['name'], $work['start_date'])) {
                $data['_work'][] = [
                    'employer'     => $work['employer']['name'],
                    'position'     => $work['position']['name'],
                    'location'     => (empty($work['location']['name']) ? null : $work['location']['name']),
                    'has_projects' => ! empty($work['projects']),
                    'start_date'   => $work['start_date'],
                    'end_date'     => (empty($work['end_date']) ? null : $work['end_date'])
                ];
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

    private function profilePicture(array &$data) {
        if (empty($data['profile']['picture']['data']['url']))
            return;

        return $data['profile']['picture']['data']['url'];
    }

    private function verifiedProfile(array &$data) {
        if (empty($data['profile']['verified']))
            return false;

        return $data['profile']['verified'];
    }

    private function isACommonName(array &$data) {
        $name = $this->firstName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isCommonName($name);
    }

    private function isListedName(array &$data) {
        $name = $this->fullName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isListedName($name);
    }

    private function isFantasyName(array &$data) {
        $name = $this->fullName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isFantasyName($name);
    }

    private function isSanctionedName(array &$data) {
        $name = $this->fullName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isSanctionedName($name);
    }

    private function isPEPName(array &$data) {
        $name = $this->fullName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isPEPName($name);
    }

    private function isCelebrityName(array &$data) {
        $name = $this->fullName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isCelebrityName($name);
    }

    private function isSillyName(array &$data) {
        $name = $this->fullName($data);
        if ($name === null)
            return false;

        return Utils::getInstance()->isSillyName($name);
    }

    private function nameGender(array &$data) {
        $name = $this->firstName($data);
        if ($name === null)
            return;

        return Utils::getInstance()->nameGender($name);
    }

    private function fullName(array &$data) {
        if ((empty($data['profile']['first_name'])) || (empty($data['profile']['last_name'])))
            return;

        return sprintf('%s %s', trim($data['profile']['first_name']), trim($data['profile']['last_name']));
    }

    private function firstName(array &$data) {
        $name = $this->fullName($data);
        if (empty($name))
            return;

        return Utils::getInstance()->firstName($name);
    }

    private function firstNameInitial(array &$data) {
        $name = $this->fullName($data);
        if (empty($name))
            return;

        return Utils::getInstance()->firstNameInitial($name);
    }

    private function middleName(array &$data) {
        $name = $this->fullName($data);
        if (empty($name))
            return;

        return Utils::getInstance()->middleName($name);
    }

    private function middleNameInitial(array &$data) {
        $name = $this->fullName($data);
        if (empty($name))
            return;

        return Utils::getInstance()->middleNameInitial($name);
    }

    private function lastName(array &$data) {
        $name = $this->fullName($data);
        if (empty($name))
            return;

        return Utils::getInstance()->lastName($name);
    }

    private function lastNameInitial(array &$data) {
        $name = $this->fullName($data);
        if (empty($name))
            return;

        return Utils::getInstance()->lastNameInitial($name);
    }

    private function profile_gender(array &$data) {
        if (empty($data['profile']['gender']))
            return;

        return strtolower($data['profile']['gender']);
    }

    private function emailAddress(array &$data) {
        if ((empty($data['profile']['email'])) || (strpos($data['profile']['email'], '@') === false))
            return;

        return $data['profile']['email'];
    }

    private function emailUsername(array &$data) {
        $email = $this->emailAddress($data);
        if ($email === null)
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function pictureIsSilhouette(array &$data) {
        if (empty($data['profile']['picture']['data']['is_silhouette']))
            return false;

        return $data['profile']['picture']['data']['is_silhouette'];
    }

    private function hometownCityName(array &$data) {
        if (empty($data['profile']['hometown']['name']))
            return;
        if (strpos($data['profile']['hometown']['name'], ',') === false)
            return $data['profile']['hometown']['name'];
        $name = explode(',', $data['profile']['hometown']['name']);

        return $name[0];
    }

    private function hometownRegionName(array &$data) {
        $city = $this->hometownCityName($data);
        if ($city === null)
            return;

        return Utils::getInstance()->regionFromCity($city);
    }

    private function hometownCountryName(array &$data) {
        if (empty($data['profile']['hometown']['name']))
            return;
        if (strpos($data['profile']['hometown']['name'], ',') === false)
            return Utils::getInstance()->countryFromCity($data['profile']['hometown']['name']);

        $name = explode(',', $data['profile']['hometown']['name']);

        return trim(array_pop($name));
    }

    private function currentCityName(array &$data) {
        if (empty($data['profile']['location']['name']))
            return;
        if (strpos($data['profile']['location']['name'], ',') === false)
            return $data['profile']['location']['name'];
        $name = explode(',', $data['profile']['location']['name']);

        return $name[0];
    }

    private function currentRegionName(array &$data) {
        $city = $this->currentCityName($data);
        if ($city === null)
            return;

        return Utils::getInstance()->regionFromCity($city);
    }

    private function currentCountryName(array &$data) {
        if (empty($data['profile']['location']['name']))
            return;
        if (strpos($data['profile']['location']['name'], ',') === false)
            return Utils::getInstance()->countryFromCity($data['profile']['location']['name']);

        $name = explode(',', $data['profile']['location']['name']);

        return trim(array_pop($name));
    }

    private function numFamilyMembersWithSameLastName(array &$data) {
        if (empty($data['family']))
            return 0;

        $lastName = $this->lastName($data);
        if ($lastName === null)
            return 0;

        $utils = Utils::getInstance();
        $count = 0;
        foreach ($data['family'] as $person) {
            if (empty($person['last_name']))
                continue;
            if ($lastName === $utils->lastName($person['last_name']))
                $count++;
        }

        return $count;
    }

    private function numFriendsWithSameLastName(array &$data) {
        $lastName = $this->lastName($data);
        if ($lastName === null)
            return 0;

        if (empty($data['friends'])) {
            return 0;
        }

        $friends = $data['friends'];
        $lastName = strtolower($lastName);
        $utils   = Utils::getInstance();
        $count   = 0;
        foreach ($friends as $friend) {
            if (empty($friend['last_name'])) {
                continue;
            }

            $friendLastName = $utils->lastName($friend['last_name']);
            if (empty($friendLastName)) {
                continue;
            }

            if ($lastName === strtolower($friendLastName)) {
                $count++;
            }
        }

        return $count;
    }

    private function top1FriendsCity(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);

        return $cities[0];
    }

    private function top1FriendsCountry(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);

        return $countries[0];
    }

    private function top2FriendsCity(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[1]))
            return;

        return $cities[1];
    }

    private function top2FriendsCountry(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[1]))
            return;

        return $countries[1];
    }

    private function top3FriendsCity(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[2]))
            return;

        return $cities[2];
    }

    private function top3FriendsCountry(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[2]))
            return;

        return $countries[2];
    }

    private function top4FriendsCity(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[3]))
            return;

        return $cities[3];
    }

    private function top4FriendsCountry(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[3]))
            return;

        return $countries[3];
    }

    private function top5FriendsCity(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['city']))
            return;
        $cities = array_keys($distribution['city']);
        if (empty($cities[4]))
            return;

        return $cities[4];
    }

    private function top5FriendsCountry(array &$data) {
        $distribution = $this->_location_distribution($data);
        if (empty($distribution['country']))
            return;
        $countries = array_keys($distribution['country']);
        if (empty($countries[4]))
            return;

        return $countries[4];
    }

    private function mostActiveCity(&$data, $months) {
        $activity = [];
        $now      = time();
        $limit    = ($months * 2629743);
        foreach (['locations', 'links', 'photos', 'posts', 'statuses', 'tagged'] as $field) {
            if (empty($data[$field]))
                continue;
            foreach ($data[$field] as $item) {
                if ((empty($item['created_time'])) || (empty($item['place']['location']['city'])))
                    continue;
                $timestamp = strtotime($item['created_time']);
                if (empty($timestamp))
                    continue;
                if (($now - $timestamp) > $limit)
                    break;
                if (! isset($activity[$item['place']['location']['city']]))
                    $activity[$item['place']['location']['city']] = 0;
                $activity[$item['place']['location']['city']]++;
            }
        }
        if (empty($activity))
            return;
        arsort($activity);
        $activity = array_keys($activity);

        return $activity[0];
    }

    private function mostActiveCountry(&$data, $months) {
        $activity = [];
        $now      = time();
        $limit    = ($months * 2629743);
        foreach (['locations', 'links', 'photos', 'posts', 'statuses', 'tagged'] as $field) {
            if (empty($data[$field]))
                continue;
            foreach ($data[$field] as $item) {
                if ((empty($item['created_time'])) || (empty($item['place']['location']['country'])))
                    continue;
                $timestamp = strtotime($item['created_time']);
                if (empty($timestamp))
                    continue;
                if (($now - $timestamp) > $limit)
                    break;
                if (! isset($activity[$item['place']['location']['country']]))
                    $activity[$item['place']['location']['country']] = 0;
                $activity[$item['place']['location']['country']]++;
            }
        }
        if (empty($activity))
            return;
        arsort($activity);
        $activity = array_keys($activity);

        return $activity[0];
    }

    private function avgFriendsBirthYear(array &$data) {
        $distribution = $this->_age_distribution($data);
        if (empty($distribution))
            return 0;
        $years = array_keys($distribution);

        return $years[0];
    }

    private function numOfFriendsWithinOneYyear(array &$data) {
        $birth = $this->birth($data, 2);
        if (empty($birth))
            return 0;

        $distribution = $this->_age_distribution($data);
        if (empty($distribution))
            return 0;

        $count = 0;
        foreach ($distribution as $year => $number)
            if (abs($birth - $year) <= 1)
                $count += $number;

        return $count;
    }

    private function numOfFriendsWithinTwoYears(array &$data) {
        $birth = $this->birth($data, 2);
        if (empty($birth))
            return 0;

        $distribution = $this->_age_distribution($data);
        if (empty($distribution))
            return 0;

        $count = 0;
        foreach ($distribution as $year => $number)
            if (abs($birth - $year) <= 2)
                $count += $number;

        return $count;
    }

    private function numOfFriendsWithinThreeYears(array &$data) {
        $birth = $this->birth($data, 2);
        if (empty($birth))
            return 0;

        $distribution = $this->_age_distribution($data);
        if (empty($distribution))
            return 0;

        $count = 0;
        foreach ($distribution as $year => $number)
            if (abs($birth - $year) <= 3)
                $count += $number;

        return $count;
    }

    private function numOfFriendsWithinFourYears(array &$data) {
        $birth = $this->birth($data, 2);
        if (empty($birth))
            return 0;

        $distribution = $this->_age_distribution($data);
        if (empty($distribution))
            return 0;

        $count = 0;
        foreach ($distribution as $year => $number)
            if (abs($birth - $year) <= 4)
                $count += $number;

        return $count;
    }

    private function numOfFriendsWithinFiveYears(array &$data) {
        $birth = $this->birth($data, 2);
        if (empty($birth))
            return 0;

        $distribution = $this->_age_distribution($data);
        if (empty($distribution))
            return 0;

        $count = 0;
        foreach ($distribution as $year => $number)
            if (abs($birth - $year) <= 5)
                $count += $number;

        return $count;
    }

    private function avgPostsPerWeek(array &$data) {
        $posts = [];
        foreach (['links', 'photos', 'posts', 'statuses'] as $property)
            if (! empty($data[$property]))
                foreach ($data[$property] as $item) {
                    if (empty($item['created_time']))
                        $ts = strtotime($item['updated_time']);
                    else
                        $ts = strtotime($item['created_time']);
                    if ($ts === false)
                        continue;
                    if (! isset($posts[date('Y', $ts)]))
                        $posts[date('Y', $ts)] = [];
                    if (! isset($posts[date('Y', $ts)][date('n', $ts)]))
                        $posts[date('Y', $ts)][date('n', $ts)] = 0;
                    $posts[date('Y', $ts)][date('n', $ts)]++;
                }
        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($posts as $year => &$months) {
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
        ksort($posts);

        return $posts;
    }

    private function avgCommentsReceivedPerWeek(array &$data) {
        $comments = [];
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property)
            if (! empty($data[$property]))
                foreach ($data[$property] as $item)
                    if (! empty($item['comments']['data'])) {
                        if (empty($item['created_time']))
                            $ts = strtotime($item['updated_time']);
                        else
                            $ts = strtotime($item['created_time']);
                        if ($ts === false)
                            continue;
                        if (! isset($comments[date('Y', $ts)]))
                            $comments[date('Y', $ts)] = [];
                        if (! isset($comments[date('Y', $ts)][date('n', $ts)]))
                            $comments[date('Y', $ts)][date('n', $ts)] = 0;
                        $comments[date('Y', $ts)][date('n', $ts)] += count($item['comments']['data']);
                    }
        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($comments as $year => &$months) {
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
        ksort($comments);

        return $comments;
    }

    private function avgLikesPerWeek(array &$data) {
        $likes = [];
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property)
            if (! empty($data[$property]))
                foreach ($data[$property] as $item)
                    if (! empty($item['likes']['data'])) {
                        if (empty($item['created_time']))
                            $ts = strtotime($item['updated_time']);
                        else
                            $ts = strtotime($item['created_time']);
                        if ($ts === false)
                            continue;
                        if (! isset($likes[date('Y', $ts)]))
                            $likes[date('Y', $ts)] = [];
                        if (! isset($likes[date('Y', $ts)][date('n', $ts)]))
                            $likes[date('Y', $ts)][date('n', $ts)] = 0;
                        $likes[date('Y', $ts)][date('n', $ts)] += count($item['likes']['data']);
                    }
        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($likes as $year => &$months) {
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
        ksort($likes);

        return $likes;
    }

    private function numCommentsReceived(array &$data) {
        $ids = [];
        if (! empty($data['links']))
            foreach ($data['links'] as $like)
                if (isset($like['comments']['data']))
                    foreach ($like['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($ids[$comment['from']['id']]))
                                $ids[$comment['from']['id']] = 0;
                            $ids[$comment['from']['id']]++;
                        }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo)
                if (isset($photo['comments']['data']))
                    foreach ($photo['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($ids[$comment['from']['id']]))
                                $ids[$comment['from']['id']] = 0;
                            $ids[$comment['from']['id']]++;
                        }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post)
                if (isset($post['comments']['data']))
                    foreach ($post['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($ids[$comment['from']['id']]))
                                $ids[$comment['from']['id']] = 0;
                            $ids[$comment['from']['id']]++;
                        }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status)
                if (isset($status['comments']['data']))
                    foreach ($status['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($ids[$comment['from']['id']]))
                                $ids[$comment['from']['id']] = 0;
                            $ids[$comment['from']['id']]++;
                        }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged)
                if (isset($tagged['comments']['data']))
                    foreach ($tagged['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($ids[$comment['from']['id']]))
                                $ids[$comment['from']['id']] = 0;
                            $ids[$comment['from']['id']]++;
                        }

        if ((isset($data['profile']['id'])) && (isset($ids[$data['profile']['id']])))
            unset($ids[$data['profile']['id']]);

        return count($ids);
    }

    private function numLikesReceived(array &$data) {
        $ids = [];
        if (! empty($data['links']))
            foreach ($data['links'] as $link)
                if (isset($link['likes']['data']))
                    foreach ($link['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($ids[$like['id']]))
                                $ids[$like['id']] = 0;
                            $ids[$like['id']]++;
                        }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo)
                if (isset($photo['likes']['data']))
                    foreach ($photo['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($ids[$like['id']]))
                                $ids[$like['id']] = 0;
                            $ids[$like['id']]++;
                        }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post)
                if (isset($post['likes']['data']))
                    foreach ($post['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($ids[$like['id']]))
                                $ids[$like['id']] = 0;
                            $ids[$like['id']]++;
                        }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status)
                if (isset($status['likes']['data']))
                    foreach ($status['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($ids[$like['id']]))
                                $ids[$like['id']] = 0;
                            $ids[$like['id']]++;
                        }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged)
                if (isset($tagged['likes']['data']))
                    foreach ($tagged['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($ids[$like['id']]))
                                $ids[$like['id']] = 0;
                            $ids[$like['id']]++;
                        }

        if ((isset($data['profile']['id'])) && (isset($ids[$data['profile']['id']])))
            unset($ids[$data['profile']['id']]);

        return count($ids);
    }

    private function numFamilyMembers(array &$data) {
        if (empty($data['family']))
            return 0;

        return count($data['family']);
    }

    private function numFriends(array &$data) {
        if (empty($data['profile']['friends']['summary']['total_count'])) {
            if (empty($data['friends']))
                return 0;

            return count($data['friends']);
        }

        return $data['profile']['friends']['summary']['total_count'];
    }

    private function closeFriends(array &$data) {
        $close = [];
        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($close[$link['from']['id']]))
                    $close[$link['from']['id']] = 0;
                $close[$link['from']['id']]++;
                if (isset($link['tags']['data']))
                    foreach ($link['tags']['data'] as $tag)
                        if (isset($tag['id'])) {
                            if (! isset($close[$tag['id']]))
                                $close[$tag['id']] = 0;
                            $close[$tag['id']]++;
                        }
                if (isset($link['comments']['data']))
                    foreach ($link['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($close[$comment['from']['id']]))
                                $close[$comment['from']['id']] = 0;
                            $close[$comment['from']['id']]++;
                        }
                if (isset($link['likes']['data']))
                    foreach ($link['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($close[$like['id']]))
                                $close[$like['id']] = 0;
                            $close[$like['id']]++;
                        }
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($close[$photo['from']['id']]))
                    $close[$photo['from']['id']] = 0;
                $close[$photo['from']['id']]++;
                if (isset($photo['tags']['data']))
                    foreach ($photo['tags']['data'] as $tag)
                        if (isset($tag['id'])) {
                            if (! isset($close[$tag['id']]))
                                $close[$tag['id']] = 0;
                            $close[$tag['id']]++;
                        }
                if (isset($photo['comments']['data']))
                    foreach ($photo['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($close[$comment['from']['id']]))
                                $close[$comment['from']['id']] = 0;
                            $close[$comment['from']['id']]++;
                        }
                if (isset($photo['likes']['data']))
                    foreach ($photo['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($close[$like['id']]))
                                $close[$like['id']] = 0;
                            $close[$like['id']]++;
                        }
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (isset($post['comments']['data']))
                    foreach ($post['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($close[$comment['from']['id']]))
                                $close[$comment['from']['id']] = 0;
                            $close[$comment['from']['id']]++;
                        }
                if (isset($post['likes']['data']))
                    foreach ($post['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($close[$like['id']]))
                                $close[$like['id']] = 0;
                            $close[$like['id']]++;
                        }
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($close[$status['from']['id']]))
                    $close[$status['from']['id']] = 0;
                $close[$status['from']['id']]++;
                if (isset($status['to']['data']))
                    foreach ($status['to']['data'] as $to) {
                        if (! isset($close[$to['id']]))
                            $close[$to['id']] = 0;
                        $close[$to['id']]++;
                    }
                if (isset($status['comments']['data']))
                    foreach ($status['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($close[$comment['from']['id']]))
                                $close[$comment['from']['id']] = 0;
                            $close[$comment['from']['id']]++;
                        }
                if (isset($status['likes']['data']))
                    foreach ($status['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($close[$like['id']]))
                                $close[$like['id']] = 0;
                            $close[$like['id']]++;
                        }
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($close[$tagged['from']['id']]))
                    $close[$tagged['from']['id']] = 0;
                $close[$tagged['from']['id']]++;
                if (isset($tagged['to']['data']))
                    foreach ($tagged['to']['data'] as $to) {
                        if (! isset($close[$to['id']]))
                            $close[$to['id']] = 0;
                        $close[$to['id']]++;
                    }
                if (isset($tagged['comments']['data']))
                    foreach ($tagged['comments']['data'] as $comment)
                        if (isset($comment['from']['id'])) {
                            if (! isset($close[$comment['from']['id']]))
                                $close[$comment['from']['id']] = 0;
                            $close[$comment['from']['id']]++;
                        }
                if (isset($tagged['likes']['data']))
                    foreach ($tagged['likes']['data'] as $like)
                        if (isset($like['id'])) {
                            if (! isset($close[$like['id']]))
                                $close[$like['id']] = 0;
                            $close[$like['id']]++;
                        }
            }

        if ((isset($data['profile']['id'])) && (isset($close[$data['profile']['id']])))
            unset($close[$data['profile']['id']]);
        arsort($close);
        $threshold = floor(current($close) / 2);
        foreach ($close as $key => $value)
            if ($value < $threshold)
                unset($close[$key]);

        return count($close);
    }

    private function schoolFriends(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = [];
        foreach ($data['profile']['education'] as $education)
            if ((isset($education['school']['id'], $education['type'])) && ($education['type'] === 'High School'))
                $educations[] = $education['school']['id'];

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'])) && (in_array($education['school']['id'], $educations)))
                    $return++;
        }

        return $return;
    }

    private function collegeFriends(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = [];
        foreach ($data['profile']['education'] as $education)
            if ((isset($education['school']['id'], $education['type'])) && ($education['type'] === 'College'))
                $educations[] = $education['school']['id'];

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'])) && (in_array($education['school']['id'], $educations)))
                    $return++;
        }

        return $return;
    }

    private function numCoworkers(array &$data) {
        if ((empty($data['profile']['work'])) || (empty($data['friends'])))
            return 0;

        $companies = [];

        foreach ($data['profile']['work'] as $company)
            if (isset($company['employer']['id']))
                $companies[] = $company['employer']['id'];

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work']))
                continue;
            foreach ($friend['work'] as $work)
                if ((isset($work['employer']['id'])) && (in_array($work['employer']['id'], $companies))) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numEvents(array &$data) {
        if (empty($data['events']))
            return 0;

        return count($data['events']);
    }

    private function numEventsAttended(array &$data) {
        if (empty($data['events']))
            return 0;
        $return = 0;
        foreach ($data['events'] as $event)
            if ((isset($event['rsvp_status'])) && (strtolower($event['rsvp_status']) === 'attending'))
                $return++;

        return $return;
    }

    private function numGroups(array &$data) {
        if (empty($data['groups']))
            return 0;

        return count($data['groups']);
    }

    private function numGroupsAdministrating(array &$data) {
        if (empty($data['groups']))
            return 0;
        $return = 0;
        foreach ($data['groups'] as $group)
            if ((isset($group['administrator'])) && ($group['administrator']))
                $return++;

        return $return;
    }

    private function numLikes(array &$data) {
        if (empty($data['likes']))
            return 0;

        return count($data['likes']);
    }

    private function numLocations(array &$data) {
        if (empty($data['locations']))
            return 0;

        return count($data['locations']);
    }

    private function numLinks(array &$data) {
        if (empty($data['links']))
            return 0;

        return count($data['links']);
    }

    private function numPhotos(array &$data) {
        if (empty($data['photos']))
            return 0;

        return count($data['photos']);
    }

    private function numPosts(array &$data) {
        if (empty($data['posts']))
            return 0;

        return count($data['posts']);
    }

    private function numStatuses(array &$data) {
        if (empty($data['statuses']))
            return 0;

        return count($data['statuses']);
    }

    private function numTagged(array &$data) {
        if (empty($data['tagged']))
            return 0;

        return count($data['tagged']);
    }

    private function profileAge(array &$data) {
        $age = null;
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property)
            if (! empty($data[$property]))
                foreach ($data[$property] as $item) {
                    if (empty($item['created_time']))
                        $timestamp = strtotime($item['updated_time']);
                    else
                        $timestamp = strtotime($item['created_time']);
                    if ($timestamp === false)
                        continue;
                    if (($age === null) || ($timestamp < $age))
                        $age = $timestamp;
                }

        return $age;
    }

    private function birth(&$data, $position) {
        if (empty($data['profile']['birthday']))
            return 0;
        if (strpos($data['profile']['birthday'], '/') === false)
            return 0;
        $date = explode('/', $data['profile']['birthday']);
        if (isset($date[$position]))
            return intval($date[$position]);

        return 0;
    }

    private function firstMostRecentEducation(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['name']))
            return;

        return $educations[0]['name'];
    }

    private function secondMostRecentEducation(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['name']))
            return;

        return $educations[1]['name'];
    }

    private function thirdMostRecentEducation(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['name']))
            return;

        return $educations[2]['name'];
    }

    private function firstMostRecentEducationType(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['type']))
            return;

        return $educations[0]['type'];
    }

    private function secondMostRecentEducationType(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['type']))
            return;

        return $educations[1]['type'];
    }

    private function thirdMostRecentEducationType(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['type']))
            return;

        return $educations[2]['type'];
    }

    private function firstMostRecentEducationCourse(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['course']))
            return;

        return $educations[0]['course'];
    }

    private function secondMostRecentEducationCourse(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['course']))
            return;

        return $educations[1]['course'];
    }

    private function thirdMostRecentEducationCourse(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['course']))
            return;

        return $educations[2]['course'];
    }

    private function firstMostRecentEducationGraduationYear(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['year']))
            return;

        return $educations[0]['year'];
    }

    private function secondMostRecentEducationGraduationYear(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['year']))
            return;

        return $educations[1]['year'];
    }

    private function thirdMostRecentEducationGraduationYear(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['year']))
            return;

        return $educations[2]['year'];
    }

    private function firstMostRecentEducation_graduated(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['year']))
            return;

        return $educations[0]['year'] < date('Y');
    }

    private function secondMostRecentEducation_graduated(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[1]['year']))
            return;

        return $educations[1]['year'] < date('Y');
    }

    private function thirdMostRecentEducation_graduated(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[2]['year']))
            return;

        return $educations[2]['year'] < date('Y');
    }

    private function numFriendsFirstMostRecentEducation(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[0]['id']))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'])) && ($education['school']['id'] === $educations[0]['id'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsSecondMostRecentEducation(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[1]['id']))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'])) && ($education['school']['id'] === $educations[1]['id'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsThirdMostRecentEducation(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[2]['id']))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'])) && ($education['school']['id'] === $educations[2]['id'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsFirstMostRecentEducationSameGraduationYear(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if ((empty($educations[0]['id'])) || (empty($educations[0]['year'])))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'], $education['year']['name'])) &&
                    ($education['school']['id'] === $educations[0]['id']) &&
                    ($education['year']['name'] == $educations[0]['year'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsSecondMostRecentEducationSameGraduationYear(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if ((empty($educations[1]['id'])) || (empty($educations[1]['year'])))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'], $education['year']['name'])) &&
                    ($education['school']['id'] === $educations[1]['id']) &&
                    ($education['year']['name'] == $educations[1]['year'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsThirdMostRecentEducationSameGraduationYear(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if ((empty($educations[2]['id'])) || (empty($educations[2]['year'])))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['school']['id'], $education['year']['name'])) &&
                    ($education['school']['id'] === $educations[2]['id']) &&
                    ($education['year']['name'] == $educations[2]['year'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsWorkingFirstMostRecentEducation(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[0]['id']))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work']))
                continue;
            foreach ($friend['work'] as $work)
                if ((isset($work['employer']['id'])) && ($work['employer']['id'] === $educations[0]['id'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsWorkingSecondMostRecentEducation(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[1]['id']))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work']))
                continue;
            foreach ($friend['work'] as $work)
                if ((isset($work['employer']['id'])) && ($work['employer']['id'] === $educations[1]['id'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numFriendsWorkingThirdMostRecentEducation(array &$data) {
        if ((empty($data['profile']['education'])) || (empty($data['friends'])))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[2]['id']))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work']))
                continue;
            foreach ($friend['work'] as $work)
                if ((isset($work['employer']['id'])) && ($work['employer']['id'] === $educations[2]['id'])) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numCheckinsFirstMostRecentEducationThisYear(array &$data) {
        if (empty($data['profile']['education']))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[0]['id']))
            return 0;

        $year = date('Y');

        $return = 0;
        if (! empty($data['locations']))
            foreach ($data['locations'] as $location) {
                if (! isset($location['created_time'], $location['place']['id']))
                    continue;

                if ($location['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($link['created_time'], $link['place']['id']))
                    continue;

                if ($link['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id']))
                    continue;

                if ($photo['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (! isset($post['created_time'], $post['place']['id']))
                    continue;

                if ($post['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($status['created_time'], $status['place']['id']))
                    continue;

                if ($status['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id']))
                    continue;

                if ($tagged['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        return $return;
    }

    private function numCheckinsSecondMostRecentEducationThisYear(array &$data) {
        if (empty($data['profile']['education']))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[1]['id']))
            return 0;

        $year = date('Y');

        $return = 0;
        if (! empty($data['locations']))
            foreach ($data['locations'] as $location) {
                if (! isset($location['created_time'], $location['place']['id']))
                    continue;

                if ($location['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($link['created_time'], $link['place']['id']))
                    continue;

                if ($link['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id']))
                    continue;

                if ($photo['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (! isset($post['created_time'], $post['place']['id']))
                    continue;

                if ($post['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($status['created_time'], $status['place']['id']))
                    continue;

                if ($status['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id']))
                    continue;

                if ($tagged['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        return $return;
    }

    private function numCheckinsThirdMostRecentEducationThisYear(array &$data) {
        if (empty($data['profile']['education']))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[2]['id']))
            return 0;

        $year = date('Y');

        $return = 0;
        if (! empty($data['locations']))
            foreach ($data['locations'] as $location) {
                if (! isset($location['created_time'], $location['place']['id']))
                    continue;

                if ($location['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($link['created_time'], $link['place']['id']))
                    continue;

                if ($link['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id']))
                    continue;

                if ($photo['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (! isset($post['created_time'], $post['place']['id']))
                    continue;

                if ($post['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($status['created_time'], $status['place']['id']))
                    continue;

                if ($status['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id']))
                    continue;

                if ($tagged['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        return $return;
    }

    private function numCheckinsFirstMostRecentEducationLastYear(array &$data) {
        if (empty($data['profile']['education']))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[0]['id']))
            return 0;

        $year = (date('Y') - 1);

        $return = 0;
        if (! empty($data['locations']))
            foreach ($data['locations'] as $location) {
                if (! isset($location['created_time'], $location['place']['id']))
                    continue;

                if ($location['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($link['created_time'], $link['place']['id']))
                    continue;

                if ($link['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id']))
                    continue;

                if ($photo['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (! isset($post['created_time'], $post['place']['id']))
                    continue;

                if ($post['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($status['created_time'], $status['place']['id']))
                    continue;

                if ($status['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id']))
                    continue;

                if ($tagged['place']['id'] !== $educations[0]['id'])
                    continue;

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        return $return;
    }

    private function numCheckinsSecondMostRecentEducationLastYear(array &$data) {
        if (empty($data['profile']['education']))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[1]['id']))
            return 0;

        $year = (date('Y') - 1);

        $return = 0;
        if (! empty($data['locations']))
            foreach ($data['locations'] as $location) {
                if (! isset($location['created_time'], $location['place']['id']))
                    continue;

                if ($location['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($link['created_time'], $link['place']['id']))
                    continue;

                if ($link['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id']))
                    continue;

                if ($photo['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (! isset($post['created_time'], $post['place']['id']))
                    continue;

                if ($post['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($status['created_time'], $status['place']['id']))
                    continue;

                if ($status['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id']))
                    continue;

                if ($tagged['place']['id'] !== $educations[1]['id'])
                    continue;

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        return $return;
    }

    private function numCheckinsThirdMostRecentEducationLastYear(array &$data) {
        if (empty($data['profile']['education']))
            return 0;

        $educations = $this->_education($data);

        if (empty($educations[2]['id']))
            return 0;

        $year = (date('Y') - 1);

        $return = 0;
        if (! empty($data['locations']))
            foreach ($data['locations'] as $location) {
                if (! isset($location['created_time'], $location['place']['id']))
                    continue;

                if ($location['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                if (! isset($link['created_time'], $link['place']['id']))
                    continue;

                if ($link['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id']))
                    continue;

                if ($photo['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (! isset($post['created_time'], $post['place']['id']))
                    continue;

                if ($post['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                if (! isset($status['created_time'], $status['place']['id']))
                    continue;

                if ($status['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id']))
                    continue;

                if ($tagged['place']['id'] !== $educations[2]['id'])
                    continue;

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year)
                    $return++;
            }

        return $return;
    }

    private function numOfStudentFriends(array &$data) {
        if (empty($data['friends']))
            return 0;

        $year = date('Y');

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education']))
                continue;
            foreach ($friend['education'] as $education)
                if ((isset($education['year']['name'])) && ($education['year']['name'] >= $year)) {
                    $return++;
                    break;
                }
        }

        return $return;
    }

    private function numOfStudentFriendsWithSameAge(array &$data) {
        if (empty($data['friends']))
            return 0;

        $birthYear = $this->birth($data, 2);
        if (empty($birthYear))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if ((empty($friend['birthday'])) || (empty($friend['education'])))
                continue;

            if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
                if ($birthYear != $matches[2])
                    continue;
                foreach ($friend['education'] as $education)
                    if ((isset($education['year']['name'])) && ($education['year']['name'] >= date('Y'))) {
                        $return++;
                        break;
                    }
            }
        }

        return $return;
    }

    private function numOfStudentFriendsWithinOneYearAgeDifference(array &$data) {
        if (empty($data['friends']))
            return 0;

        $birthYear = $this->birth($data, 2);
        if (empty($birthYear))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if ((empty($friend['birthday'])) || (empty($friend['education'])))
                continue;

            if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
                if (abs($birthYear - $matches[2]) > 1)
                    continue;
                foreach ($friend['education'] as $education)
                    if ((isset($education['year']['name'])) && ($education['year']['name'] >= date('Y'))) {
                        $return++;
                        break;
                    }
            }
        }

        return $return;
    }

    private function numOfStudentFriendsWithinTwoYearsAgeDifference(array &$data) {
        if (empty($data['friends']))
            return 0;

        $birthYear = $this->birth($data, 2);
        if (empty($birthYear))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if ((empty($friend['birthday'])) || (empty($friend['education'])))
                continue;

            if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
                if (abs($birthYear - $matches[2]) > 2)
                    continue;
                foreach ($friend['education'] as $education)
                    if ((isset($education['year']['name'])) && ($education['year']['name'] >= date('Y'))) {
                        $return++;
                        break;
                    }
            }
        }

        return $return;
    }

    private function numOfStudentFriendsWithinThreeYearsAgeDifference(array &$data) {
        if (empty($data['friends']))
            return 0;

        $birthYear = $this->birth($data, 2);
        if (empty($birthYear))
            return 0;

        $friends = $data['friends'];
        $return  = 0;
        foreach ($friends as $friend) {
            if ((empty($friend['birthday'])) || (empty($friend['education'])))
                continue;

            if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
                if (abs($birthYear - $matches[2]) > 3)
                    continue;
                foreach ($friend['education'] as $education)
                    if ((isset($education['year']['name'])) && ($education['year']['name'] >= date('Y'))) {
                        $return++;
                        break;
                    }
            }
        }

        return $return;
    }

    private function isAStudent(array &$data) {
        if (empty($data['profile']['education']))
            return;

        $educations = $this->_education($data);

        if (empty($educations[0]['year']))
            return false;

        return $educations[0]['year'] >= date('Y');
    }

    private function isWithinStudentAge(array &$data) {
        $birthYear = $this->birth($data, 2);
        if (empty($birthYear))
            return;

        $age = (date('Y') - $birthYear);

        //from 10 to 18 for mid/high school
        //from 18 to 25 for college
        return ($age >= 10) && ($age <= 25);
    }

    private function isInARelationship(array &$data) {
        if (empty($data['relationship_status']))
            return false;

        return in_array($data['relationship_status'], ['In a relationship', 'Engaged', 'Married', 'In a civil union', 'In a domestic partnership', 'In an open relationship', 'It\'s complicated']);
    }

    private function significantOther(array &$data) {
        if (empty($data['profile']['significant_other']['name']))
            return;

        return $data['profile']['significant_other']['name'];
    }

    private function firstMostRecentEmployer(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['employer']))
            return;

        return $works[0]['employer'];
    }

    private function secondMostRecentEmployer(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['employer']))
            return;

        return $works[1]['employer'];
    }

    private function thirdMostRecentEmployer(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['employer']))
            return;

        return $works[2]['employer'];
    }

    private function fourthMostRecentEmployer(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['employer']))
            return;

        return $works[3]['employer'];
    }

    private function fifthMostRecentEmployer(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['employer']))
            return;

        return $works[4]['employer'];
    }

    private function firstMostRecentWorkPosition(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['position']))
            return;

        return $works[0]['position'];
    }

    private function secondMostRecentWorkPosition(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['position']))
            return;

        return $works[1]['position'];
    }

    private function thirdMostRecentWorkPosition(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['position']))
            return;

        return $works[2]['position'];
    }

    private function fourthMostRecentWorkPosition(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['position']))
            return;

        return $works[3]['position'];
    }

    private function fifthMostRecentWorkPosition(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['position']))
            return;

        return $works[4]['position'];
    }

    private function firstMostRecentWorkLocation(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]['location']))
            return;

        return $works[0]['location'];
    }

    private function secondMostRecentWorkLocation(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]['location']))
            return;

        return $works[1]['location'];
    }

    private function thirdMostRecentWorkLocation(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]['location']))
            return;

        return $works[2]['location'];
    }

    private function fourthMostRecentWorkLocation(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]['location']))
            return;

        return $works[3]['location'];
    }

    private function fifthMostRecentWorkLocation(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]['location']))
            return;

        return $works[4]['location'];
    }

    private function firstMostRecentWorkHasProjects(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (isset($works[0]['has_projects']))
            return $works[0]['has_projects'];

        return;
    }

    private function secondMostRecentWorkHasProjects(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (isset($works[1]['has_projects']))
            return $works[1]['has_projects'];

        return;
    }

    private function thirdMostRecentWorkHasProjects(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (isset($works[2]['has_projects']))
            return $works[2]['has_projects'];

        return;
    }

    private function fourthMostRecentWorkHasProjects(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (isset($works[3]['has_projects']))
            return $works[3]['has_projects'];

        return;
    }

    private function fifthMostRecentWorkHasProjects(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (isset($works[4]['has_projects']))
            return $works[4]['has_projects'];

        return;
    }

    private function firstMostRecentWorkIsCurrent(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[0]))
            return;

        return empty($works[0]['end_date']);
    }

    private function secondMostRecentWorkIsCurrent(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[1]))
            return;

        return empty($works[1]['end_date']);
    }

    private function thirdMostRecentWorkIs_current(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[2]))
            return;

        return empty($works[2]['end_date']);
    }

    private function fourthMostRecentWorkIsCurrent(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[3]))
            return;

        return empty($works[3]['end_date']);
    }

    private function fifthMostRecentWorkIsCurrent(array &$data) {
        if (empty($data['profile']['work']))
            return;

        $works = $this->_work($data);

        if (empty($works[4]))
            return;

        return empty($works[4]['end_date']);
    }

    public function analyze(array $data) : array {
        return [
            'isActive'                                                        => ! empty($data),
            'profilePicture'                                                  => $this->profilePicture($data),
            'verifiedProfile'                                                 => $this->verifiedProfile($data),
            'isACommonName'                                                   => $this->isACommonName($data),
            'isListedName'                                                    => $this->isListedName($data),
            'isFantasyName'                                                   => $this->isFantasyName($data),
            'isSanctionedName'                                                => $this->isSanctionedName($data),
            'isPEPName'                                                       => $this->isPEPName($data),
            'isCelebrityName'                                                 => $this->isCelebrityName($data),
            'isSillyName'                                                     => $this->isSillyName($data),
            'nameGender'                                                      => $this->nameGender($data),
            'fullName'                                                        => $this->fullName($data),
            'firstName'                                                       => $this->firstName($data),
            'firstNameInitial'                                                => $this->firstNameInitial($data),
            'middleName'                                                      => $this->middleName($data),
            'middleNameInitial'                                               => $this->middleNameInitial($data),
            'lastName'                                                        => $this->lastName($data),
            'lastNameInitial'                                                 => $this->lastNameInitial($data),
            'profileGender'                                                   => $this->profile_gender($data),
            'emailAddress'                                                    => $this->emailAddress($data),
            'emailUsername'                                                   => $this->emailUsername($data),
            'pictureIsSilhouette'                                             => $this->pictureIsSilhouette($data),
            'hometownCityName'                                                => $this->hometownCityName($data),
            'hometownRegionName'                                              => $this->hometownRegionName($data),
            'hometownCountryName'                                             => $this->hometownCountryName($data),
            'currentCityName'                                                 => $this->currentCityName($data),
            'currentRegionName'                                               => $this->currentRegionName($data),
            'currentCountryName'                                              => $this->currentCountryName($data),
            'numFamilyMembersWithSameLastName'                                => $this->numFamilyMembersWithSameLastName($data),
            'numFriendsWithSameLastName'                                      => $this->numFriendsWithSameLastName($data),
            'top1FriendsCity'                                                 => $this->top1FriendsCity($data),
            'top1FriendsCountry'                                              => $this->top1FriendsCountry($data),
            'top2FriendsCity'                                                 => $this->top2FriendsCity($data),
            'top2FriendsCountry'                                              => $this->top2FriendsCountry($data),
            'top3FriendsCity'                                                 => $this->top3FriendsCity($data),
            'top3FriendsCountry'                                              => $this->top3FriendsCountry($data),
            'top4FriendsCity'                                                 => $this->top4FriendsCity($data),
            'top4FriendsCountry'                                              => $this->top4FriendsCountry($data),
            'top5FriendsCity'                                                 => $this->top5FriendsCity($data),
            'top5FriendsCountry'                                              => $this->top5FriendsCountry($data),
            'mostActiveCityPastMonth'                                         => $this->mostActiveCity($data, 1),
            'mostActiveCountryPastMonth'                                      => $this->mostActiveCountry($data, 1),
            'mostActiveCityPastSixMonths'                                     => $this->mostActiveCity($data, 6),
            'mostActiveCountrySixMonths'                                      => $this->mostActiveCountry($data, 6),
            'mostActiveCityPastYear'                                          => $this->mostActiveCity($data, 12),
            'mostActiveCountryPastYear'                                       => $this->mostActiveCountry($data, 12),
            'avgFriendsBirthYear'                                             => $this->avgFriendsBirthYear($data),
            'numOfFriendsBirthWithinOneYear'                                  => $this->numOfFriendsWithinOneYyear($data),
            'numOfFriendsBirthWithinTwoYears'                                 => $this->numOfFriendsWithinTwoYears($data),
            'numOfFriendsBirthWithinThreeYears'                               => $this->numOfFriendsWithinThreeYears($data),
            'numOfFriendsBirthWithinFourYears'                                => $this->numOfFriendsWithinFourYears($data),
            'numOfFriendsBirthWithinFiveYears'                                => $this->numOfFriendsWithinFiveYears($data),
            'avgPostsPerWeek'                                                 => $this->avgPostsPerWeek($data),
            'avgCommentsReceivedPerWeek'                                      => $this->avgCommentsReceivedPerWeek($data),
            'avgLikesPerWeek'                                                 => $this->avgLikesPerWeek($data),
            'numOfReceivedComments'                                           => $this->numCommentsReceived($data),
            'numOfReceivedLikes'                                              => $this->numLikesReceived($data),
            'numOfFamilyMembers'                                              => $this->numFamilyMembers($data),
            'numOfFriends'                                                    => $this->numFriends($data),
            'numOfCloseFriends'                                               => $this->closeFriends($data),
            'numOfSchoolFriends'                                              => $this->schoolFriends($data),
            'numOfCollegeFriends'                                             => $this->collegeFriends($data),
            'numOfCoworkers'                                                  => $this->numCoworkers($data),
            'numOfEvents'                                                     => $this->numEvents($data),
            'numOfEventsAttended'                                             => $this->numEventsAttended($data),
            'numOfGroups'                                                     => $this->numGroups($data),
            'numOfGroupsAdministrating'                                       => $this->numGroupsAdministrating($data),
            'numOfLikes'                                                      => $this->numLikes($data),
            'numOfLocations'                                                  => $this->numLocations($data),
            'numOfLinks'                                                      => $this->numLinks($data),
            'numOfPhotos'                                                     => $this->numPhotos($data),
            'numOfPosts'                                                      => $this->numPosts($data),
            'numOfStatuses'                                                   => $this->numStatuses($data),
            'numOfTagged'                                                     => $this->numTagged($data),
            'profileAge'                                                      => $this->profileAge($data),
            'birthDay'                                                        => $this->birth($data, 1),
            'birthMonth'                                                      => $this->birth($data, 0),
            'birthYear'                                                       => $this->birth($data, 2),
            'firstMostRecentEducation'                                        => $this->firstMostRecentEducation($data),
            'secondMostRecentEducation'                                       => $this->secondMostRecentEducation($data),
            'thirdMostRecentEducation'                                        => $this->thirdMostRecentEducation($data),
            'firstMostRecentEducationType'                                    => $this->firstMostRecentEducationType($data),
            'secondMostRecentEducationType'                                   => $this->secondMostRecentEducationType($data),
            'thirdMostRecentEducationType'                                    => $this->thirdMostRecentEducationType($data),
            'firstMostRecentEducationCourse'                                  => $this->firstMostRecentEducationCourse($data),
            'secondMostRecentEducationCourse'                                 => $this->secondMostRecentEducationCourse($data),
            'thirdMostRecentEducationCourse'                                  => $this->thirdMostRecentEducationCourse($data),
            'firstMostRecentEducationGraduationYear'                          => $this->firstMostRecentEducationGraduationYear($data),
            'secondMostRecentEducationGraduationYear'                         => $this->secondMostRecentEducationGraduationYear($data),
            'thirdMostRecentEducationGraduationYear'                          => $this->thirdMostRecentEducationGraduationYear($data),
            'isFirstMostRecentEducationGraduated'                             => $this->firstMostRecentEducation_graduated($data),
            'isSecondMostRecentEducationGraduated'                            => $this->secondMostRecentEducation_graduated($data),
            'isThirdMostRecentEducationGraduated'                             => $this->thirdMostRecentEducation_graduated($data),
            'numOfFriendsFromFirstMostRecentEducation'                        => $this->numFriendsFirstMostRecentEducation($data),
            'numOfFriendsFromSecondMostRecentEducation'                       => $this->numFriendsSecondMostRecentEducation($data),
            'numOfFriendsFromThirdMostRecentEducation'                        => $this->numFriendsThirdMostRecentEducation($data),
            'numOfFriendsFromFirstMostRecentEducationWithSameGraduationYear'  => $this->numFriendsFirstMostRecentEducationSameGraduationYear($data),
            'numOfFriendsFromSecondMostRecentEducationWithSameGraduationYear' => $this->numFriendsSecondMostRecentEducationSameGraduationYear($data),
            'numOfFriendsFromThirdMostRecentEducationWithSameGraduationYear'  => $this->numFriendsThirdMostRecentEducationSameGraduationYear($data),
            'numOfFriendsWorkingAtFirstMostRecentEducation'                   => $this->numFriendsWorkingFirstMostRecentEducation($data),
            'numOfFriendsWorkingAtSecondMostRecentEducation'                  => $this->numFriendsWorkingSecondMostRecentEducation($data),
            'numOfFriendsWorkingAtThirdMostRecentEducation'                   => $this->numFriendsWorkingThirdMostRecentEducation($data),
            'numOfCheckinsAtFirstMostRecentEducationThisYear'                 => $this->numCheckinsFirstMostRecentEducationThisYear($data),
            'numOfCheckinsAtSecondMostRecentEducationThisYear'                => $this->numCheckinsSecondMostRecentEducationThisYear($data),
            'numOfCheckinsAtThirdMostRecentEducationThisYear'                 => $this->numCheckinsThirdMostRecentEducationThisYear($data),
            'numOfCheckinsAtFirstMostRecentEducationLastYear'                 => $this->numCheckinsFirstMostRecentEducationLastYear($data),
            'numOfCheckinsAtSecondMostRecentEducationLastYear'                => $this->numCheckinsSecondMostRecentEducationLastYear($data),
            'numOfCheckinsAtThirdMostRecentEducationLastYear'                 => $this->numCheckinsThirdMostRecentEducationLastYear($data),
            'numOfStudentFriends'                                             => $this->numOfStudentFriends($data),
            'numOfStudentFriendsWithSameAge'                                  => $this->numOfStudentFriendsWithSameAge($data),
            'numOfStudentFriendsWithinOneYearAgeDifference'                   => $this->numOfStudentFriendsWithinOneYearAgeDifference($data),
            'numOfStudentFriendsWithinTwoYearsAgeDifference'                  => $this->numOfStudentFriendsWithinTwoYearsAgeDifference($data),
            'numOfStudentFriendsWithinThreeYearsAgeDifference'                => $this->numOfStudentFriendsWithinThreeYearsAgeDifference($data),
            'isAStudent'                                                      => $this->isAStudent($data),
            'isWithinStudentAge'                                              => $this->isWithinStudentAge($data),
            'isInARelationship'                                               => $this->isInARelationship($data),
            'significantOther'                                                => $this->significantOther($data),
            'firstMostRecentEmployer'                                         => $this->firstMostRecentEmployer($data),
            'secondMostRecentEmployer'                                        => $this->secondMostRecentEmployer($data),
            'thirdMostRecentEmployer'                                         => $this->thirdMostRecentEmployer($data),
            'fourthMostRecentEmployer'                                        => $this->fourthMostRecentEmployer($data),
            'fifthMostRecentEmployer'                                         => $this->fifthMostRecentEmployer($data),
            'firstMostRecentWorkPosition'                                     => $this->firstMostRecentWorkPosition($data),
            'secondMostRecentWorkPosition'                                    => $this->secondMostRecentWorkPosition($data),
            'thirdMostRecentWorkPosition'                                     => $this->thirdMostRecentWorkPosition($data),
            'fourthMostRecentWorkPosition'                                    => $this->fourthMostRecentWorkPosition($data),
            'fifthMostRecentWorkPosition'                                     => $this->fifthMostRecentWorkPosition($data),
            'firstMostRecentWorkLocation'                                     => $this->firstMostRecentWorkLocation($data),
            'secondMostRecentWorkLocation'                                    => $this->secondMostRecentWorkLocation($data),
            'thirdMostRecentWorkLocation'                                     => $this->thirdMostRecentWorkLocation($data),
            'fourthMostRecentWorkLocation'                                    => $this->fourthMostRecentWorkLocation($data),
            'fifthMostRecentWorkLocation'                                     => $this->fifthMostRecentWorkLocation($data),
            'firstMostRecentWorkHasProjects'                                  => $this->firstMostRecentWorkHasProjects($data),
            'secondMostRecentWorkHasProjects'                                 => $this->secondMostRecentWorkHasProjects($data),
            'thirdMostRecentWorkHasProjects'                                  => $this->thirdMostRecentWorkHasProjects($data),
            'fourthMostRecentWorkHasProjects'                                 => $this->fourthMostRecentWorkHasProjects($data),
            'fifthMostRecentWorkHasProjects'                                  => $this->fifthMostRecentWorkHasProjects($data),
            'firstMostRecentWorkIsCurrent'                                    => $this->firstMostRecentWorkIsCurrent($data),
            'secondMostRecentWorkIsCurrent'                                   => $this->secondMostRecentWorkIsCurrent($data),
            'thirdMostRecentWorkIsCurrent'                                    => $this->thirdMostRecentWorkIs_current($data),
            'fourthMostRecentWorkIsCurrent'                                   => $this->fourthMostRecentWorkIsCurrent($data),
            'fifthMostRecentWorkIsCurrent'                                    => $this->fifthMostRecentWorkIsCurrent($data)
        ];
    }
}
