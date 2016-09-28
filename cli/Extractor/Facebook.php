<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Facebook extends AbstractExtractor {

	private function _friends(&$data) {
		if (isset($data['_friends']))
			return $data['_friends'];

		$data['_friends'] = Profile::facebookFriends($data);
		return $data['_friends'];
	}

	private function _age_distribution(&$data) {
		if (isset($data['_age_distribution']))
			return $data['_age_distribution'];
		$years = [];
		$friends = $this->_friends($data);
		if (empty($friends))
			return $years;
		foreach ($friends as $friend) {
			if (empty($friend['birthday']))
				continue;
			if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
				if (!isset($years[$matches[2]]))
					$years[$matches[2]] = 0;
				$years[$matches[2]]++;
			}
		}
		arsort($years);
		$data['_age_distribution'] = $years;
		return $years;
	}

	private function _location_distribution(&$data) {
		if (isset($data['_location_distribution']))
			return $data['_location_distribution'];

		$location = array(
			'city' => [],
			'country' => []
		);
		$friends = $this->_friends($data);
		if (empty($friends))
			return $location;

		// $utils = Utils::getInstance();
		foreach ($friends as $friend) {
			if (empty($friend['location']['name']))
				continue;

			if (strpos($friend['location']['name'], ',') === false) {
				$city = $friend['location']['name'];
				// $country = $utils->countryFromCity($friend['location']['name']);
				$country = null;
			} else {
				$name = explode(',', $friend['location']['name']);
				$city = trim($name[0]);
				$country = trim(array_pop($name));
			}

			if (!empty($city)) {
				if (!isset($location['city'][$city]))
					$location['city'][$city] = 0;
				$location['city'][$city]++;
			}

			if (!empty($country)) {
				if (!isset($location['country'][$country]))
					$location['country'][$country] = 0;
				$location['country'][$country]++;
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

		if (empty($data['profile']['education']))
			return [];

		$data['_education'] = [];

		foreach ($data['profile']['education'] as $education)
			if (isset($education['school']['id'], $education['school']['name'], $education['year']['name'])) {
				$data['_education'][] = array(
					'id' => $education['school']['id'],
					'name' => $education['school']['name'],
					'year' => $education['year']['name'],
					'type' => (isset($education['type']) ? $education['type'] : null),
					'course' => (isset($education['concentration'][0]['name']) ? $education['concentration'][0]['name'] : null)
				);
			}

		if (count($data['_education']))
			usort($data['_education'], function ($a, $b) {
				return ($b['year'] - $a['year']);
			});


		return $data['_education'];
	}

	private function _work(&$data) {
		if (isset($data['_work']))
			return $data['_work'];

		if (empty($data['profile']['work']))
			return [];

		$data['_work'] = [];

		foreach ($data['profile']['work'] as $work)
			if (isset($work['employer']['name'], $work['position']['name'], $work['start_date'])) {
				$data['_work'][] = array(
					'employer' => $work['employer']['name'],
					'position' => $work['position']['name'],
					'location' => (empty($work['location']['name']) ? null : $work['location']['name']),
					'has_projects' => !empty($work['projects']),
					'start_date' => $work['start_date'],
					'end_date' => (empty($work['end_date']) ? null : $work['end_date'])
				);
			}

		if (count($data['_work']))
			usort($data['_work'], function ($a, $b) {
				if ((empty($a['end_date'])) && (empty($b['end_date'])))
					return ($b['start_date'] - $a['start_date']);

				if (empty($a['end_date']))
					return -1;

				if (empty($b['end_date']))
					return 1;

				if ($a['start_date'] == $b['start_date'])
					return ($b['end_date'] - $a['end_date']);

				return ($b['start_date'] - $a['start_date']);
			});

		return $data['_work'];
	}

	private function profile_picture(&$data) {
		if (empty($data['profile']['picture']['data']['url']))
			return null;
		return $data['profile']['picture']['data']['url'];
	}

	private function verified_profile(&$data) {
		if (empty($data['profile']['verified']))
			return false;
		return $data['profile']['verified'];
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
			return null;

		return Utils::getInstance()->nameGender($name);
	}

	private function full_name(&$data) {
		if ((empty($data['profile']['first_name'])) || (empty($data['profile']['last_name'])))
			return null;

		return sprintf('%s %s', trim($data['profile']['first_name']), trim($data['profile']['last_name']));
	}

	private function first_name(&$data) {
		$name = $this->full_name($data);
		if (empty($name))
			return null;

		return Utils::getInstance()->firstName($name);
	}

	private function first_name_initial(&$data) {
		$name = $this->full_name($data);
		if (empty($name))
			return null;

		return Utils::getInstance()->firstNameInitial($name);
	}

	private function middle_name(&$data) {
		$name = $this->full_name($data);
		if (empty($name))
			return null;

		return Utils::getInstance()->middleName($name);
	}

	private function middle_name_initial(&$data) {
		$name = $this->full_name($data);
		if (empty($name))
			return null;

		return Utils::getInstance()->middleNameInitial($name);
	}

	private function last_name(&$data) {
		$name = $this->full_name($data);
		if (empty($name))
			return null;

		return Utils::getInstance()->lastName($name);
	}

	private function last_name_initial(&$data) {
		$name = $this->full_name($data);
		if (empty($name))
			return null;

		return Utils::getInstance()->lastNameInitial($name);
	}

	private function profile_gender(&$data) {
		if (empty($data['profile']['gender']))
			return null;
		return strtolower($data['profile']['gender']);
	}

	private function email_address(&$data) {
		if ((empty($data['profile']['email'])) || (strpos($data['profile']['email'], '@') === false))
			return null;
		return $data['profile']['email'];
	}

	private function email_username(&$data) {
		$email = $this->email_address($data);
		if (is_null($email))
			return null;
		$email = explode('@', $email);
		return $email[0];
	}

	private function picture_is_silhouette(&$data) {
		if (empty($data['profile']['picture']['data']['is_silhouette']))
			return false;
		return $data['profile']['picture']['data']['is_silhouette'];
	}

	private function hometown_city_name(&$data) {
		if (empty($data['profile']['hometown']['name']))
			return null;
		if (strpos($data['profile']['hometown']['name'], ',') === false)
			return $data['profile']['hometown']['name'];
		$name = explode(',', $data['profile']['hometown']['name']);
		return $name[0];
	}

	private function hometown_region_name(&$data) {
		$city = $this->hometown_city_name($data);
		if (is_null($city))
			return null;

		return Utils::getInstance()->regionFromCity($city);
	}

	private function hometown_country_name(&$data) {
		if (empty($data['profile']['hometown']['name']))
			return null;
		if (strpos($data['profile']['hometown']['name'], ',') === false)
			return Utils::getInstance()->countryFromCity($data['profile']['hometown']['name']);

		$name = explode(',', $data['profile']['hometown']['name']);
		return trim(array_pop($name));
	}

	private function current_city_name(&$data) {
		if (empty($data['profile']['location']['name']))
			return null;
		if (strpos($data['profile']['location']['name'], ',') === false)
			return $data['profile']['location']['name'];
		$name = explode(',', $data['profile']['location']['name']);
		return $name[0];
	}

	private function current_region_name(&$data) {
		$city = $this->current_city_name($data);
		if (is_null($city))
			return null;

		return Utils::getInstance()->regionFromCity($city);
	}

	private function current_country_name(&$data) {
		if (empty($data['profile']['location']['name']))
			return null;
		if (strpos($data['profile']['location']['name'], ',') === false)
			return Utils::getInstance()->countryFromCity($data['profile']['location']['name']);

		$name = explode(',', $data['profile']['location']['name']);
		return trim(array_pop($name));
	}

	private function num_family_members_same_last_name(&$data) {
		if (empty($data['family']))
			return 0;

		$lastName = $this->last_name($data);
		if (is_null($lastName))
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

	private function num_friends_same_last_name(&$data) {
		$lastName = strtolower($this->last_name($data));
		if (is_null($lastName))
			return 0;

		$utils = Utils::getInstance();
		$count = 0;
		$friends = Profile::facebookGraph($data);
		foreach ($friends as $friend)
			if ($lastName === $utils->lastName($friend))
				$count++;

		return $count;
	}

	private function top1_friends_city(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['city']))
			return null;
		$cities = array_keys($distribution['city']);
		return $cities[0];
	}

	private function top1_friends_country(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['country']))
			return null;
		$countries = array_keys($distribution['country']);
		return $countries[0];
	}

	private function top2_friends_city(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['city']))
			return null;
		$cities = array_keys($distribution['city']);
		if (empty($cities[1]))
			return null;
		return $cities[1];
	}

	private function top2_friends_country(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['country']))
			return null;
		$countries = array_keys($distribution['country']);
		if (empty($countries[1]))
			return null;
		return $countries[1];
	}

	private function top3_friends_city(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['city']))
			return null;
		$cities = array_keys($distribution['city']);
		if (empty($cities[2]))
			return null;
		return $cities[2];
	}

	private function top3_friends_country(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['country']))
			return null;
		$countries = array_keys($distribution['country']);
		if (empty($countries[2]))
			return null;
		return $countries[2];
	}

	private function top4_friends_city(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['city']))
			return null;
		$cities = array_keys($distribution['city']);
		if (empty($cities[3]))
			return null;
		return $cities[3];
	}

	private function top4_friends_country(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['country']))
			return null;
		$countries = array_keys($distribution['country']);
		if (empty($countries[3]))
			return null;
		return $countries[3];
	}

	private function top5_friends_city(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['city']))
			return null;
		$cities = array_keys($distribution['city']);
		if (empty($cities[4]))
			return null;
		return $cities[4];
	}

	private function top5_friends_country(&$data) {
		$distribution = $this->_location_distribution($data);
		if (empty($distribution['country']))
			return null;
		$countries = array_keys($distribution['country']);
		if (empty($countries[4]))
			return null;
		return $countries[4];
	}

	private function most_active_city(&$data, $months) {
		$activity = [];
		$now = time();
		$limit = ($months * 2629743);
		foreach (array('locations', 'links', 'photos', 'posts', 'statuses', 'tagged') as $field) {
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
				if (!isset($activity[$item['place']['location']['city']]))
					$activity[$item['place']['location']['city']] = 0;
				$activity[$item['place']['location']['city']]++;
			}
		}
		if (empty($activity))
			return null;
		arsort($activity);
		$activity = array_keys($activity);
		return $activity[0];
	}

	private function most_active_country(&$data, $months) {
		$activity = [];
		$now = time();
		$limit = ($months * 2629743);
		foreach (array('locations', 'links', 'photos', 'posts', 'statuses', 'tagged') as $field) {
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
				if (!isset($activity[$item['place']['location']['country']]))
					$activity[$item['place']['location']['country']] = 0;
				$activity[$item['place']['location']['country']]++;
			}
		}
		if (empty($activity))
			return null;
		arsort($activity);
		$activity = array_keys($activity);
		return $activity[0];
	}

	private function avg_friends_birth_year(&$data) {
		$distribution = $this->_age_distribution($data);
		if (empty($distribution))
			return 0;
		$years = array_keys($distribution);
		return $years[0];
	}

	private function num_friends_within_oneyear(&$data) {
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

	private function num_friends_within_twoyears(&$data) {
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

	private function num_friends_within_threeyears(&$data) {
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

	private function num_friends_within_fouryears(&$data) {
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

	private function num_friends_within_fiveyears(&$data) {
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

	private function avg_posts_week(&$data) {
		$posts = [];
		foreach (array('links', 'photos', 'posts', 'statuses') as $property)
			if (!empty($data[$property]))
				foreach ($data[$property] as $item) {
					if (empty($item['created_time']))
						$ts = strtotime($item['updated_time']);
					else
						$ts = strtotime($item['created_time']);
					if ($ts === false)
						continue;
					if (!isset($posts[date('Y', $ts)]))
						$posts[date('Y', $ts)] = [];
					if (!isset($posts[date('Y', $ts)][date('n', $ts)]))
						$posts[date('Y', $ts)][date('n', $ts)] = 0;
					$posts[date('Y', $ts)][date('n', $ts)]++;
				}
		$current = array(
			'year' => date('Y'),
			'month' => date('n')
		);
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

	private function avg_comments_week(&$data) {
		$comments = [];
		foreach (array('links', 'photos', 'posts', 'statuses', 'tagged') as $property)
			if (!empty($data[$property]))
				foreach ($data[$property] as $item)
					if (!empty($item['comments']['data'])) {
						if (empty($item['created_time']))
							$ts = strtotime($item['updated_time']);
						else
							$ts = strtotime($item['created_time']);
						if ($ts === false)
							continue;
						if (!isset($comments[date('Y', $ts)]))
							$comments[date('Y', $ts)] = [];
						if (!isset($comments[date('Y', $ts)][date('n', $ts)]))
							$comments[date('Y', $ts)][date('n', $ts)] = 0;
						$comments[date('Y', $ts)][date('n', $ts)] += count($item['comments']['data']);
					}
		$current = array(
			'year' => date('Y'),
			'month' => date('n')
		);
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

	private function avg_likes_week(&$data) {
		$likes = [];
		foreach (array('links', 'photos', 'posts', 'statuses', 'tagged') as $property)
			if (!empty($data[$property]))
				foreach ($data[$property] as $item)
					if (!empty($item['likes']['data'])) {
						if (empty($item['created_time']))
							$ts = strtotime($item['updated_time']);
						else
							$ts = strtotime($item['created_time']);
						if ($ts === false)
							continue;
						if (!isset($likes[date('Y', $ts)]))
							$likes[date('Y', $ts)] = [];
						if (!isset($likes[date('Y', $ts)][date('n', $ts)]))
							$likes[date('Y', $ts)][date('n', $ts)] = 0;
						$likes[date('Y', $ts)][date('n', $ts)] += count($item['likes']['data']);
					}
		$current = array(
			'year' => date('Y'),
			'month' => date('n')
		);
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

	private function num_comments_received(&$data) {
		$ids = [];
		if (!empty($data['links']))
			foreach ($data['links'] as $like)
				if (isset($like['comments']['data']))
					foreach ($like['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($ids[$comment['from']['id']]))
								$ids[$comment['from']['id']] = 0;
							$ids[$comment['from']['id']]++;
						}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo)
				if (isset($photo['comments']['data']))
					foreach ($photo['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($ids[$comment['from']['id']]))
								$ids[$comment['from']['id']] = 0;
							$ids[$comment['from']['id']]++;
						}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post)
				if (isset($post['comments']['data']))
					foreach ($post['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($ids[$comment['from']['id']]))
								$ids[$comment['from']['id']] = 0;
							$ids[$comment['from']['id']]++;
						}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status)
				if (isset($status['comments']['data']))
					foreach ($status['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($ids[$comment['from']['id']]))
								$ids[$comment['from']['id']] = 0;
							$ids[$comment['from']['id']]++;
						}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged)
				if (isset($tagged['comments']['data']))
					foreach ($tagged['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($ids[$comment['from']['id']]))
								$ids[$comment['from']['id']] = 0;
							$ids[$comment['from']['id']]++;
						}

		if ((isset($data['profile']['id'])) && (isset($ids[$data['profile']['id']])))
			unset($ids[$data['profile']['id']]);
		return count($ids);
	}

	private function num_likes_received(&$data) {
		$ids = [];
		if (!empty($data['links']))
			foreach ($data['links'] as $link)
				if (isset($link['likes']['data']))
					foreach ($link['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($ids[$like['id']]))
								$ids[$like['id']] = 0;
							$ids[$like['id']]++;
						}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo)
				if (isset($photo['likes']['data']))
					foreach ($photo['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($ids[$like['id']]))
								$ids[$like['id']] = 0;
							$ids[$like['id']]++;
						}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post)
				if (isset($post['likes']['data']))
					foreach ($post['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($ids[$like['id']]))
								$ids[$like['id']] = 0;
							$ids[$like['id']]++;
						}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status)
				if (isset($status['likes']['data']))
					foreach ($status['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($ids[$like['id']]))
								$ids[$like['id']] = 0;
							$ids[$like['id']]++;
						}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged)
				if (isset($tagged['likes']['data']))
					foreach ($tagged['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($ids[$like['id']]))
								$ids[$like['id']] = 0;
							$ids[$like['id']]++;
						}

		if ((isset($data['profile']['id'])) && (isset($ids[$data['profile']['id']])))
			unset($ids[$data['profile']['id']]);
		return count($ids);
	}

	private function num_family_members(&$data) {
		if (empty($data['family']))
			return 0;
		return count($data['family']);
	}

	private function num_friends(&$data) {
		if (empty($data['profile']['friends']['summary']['total_count'])) {
			if (empty($data['friends']))
				return 0;
			return count($data['friends']);
		}
		return $data['profile']['friends']['summary']['total_count'];
	}

	private function close_friends(&$data) {
		$close = [];
		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($close[$link['from']['id']]))
					$close[$link['from']['id']] = 0;
				$close[$link['from']['id']]++;
				if (isset($link['tags']['data']))
					foreach ($link['tags']['data'] as $tag)
						if (isset($tag['id'])) {
							if (!isset($close[$tag['id']]))
								$close[$tag['id']] = 0;
							$close[$tag['id']]++;
						}
				if (isset($link['comments']['data']))
					foreach ($link['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($close[$comment['from']['id']]))
								$close[$comment['from']['id']] = 0;
							$close[$comment['from']['id']]++;
						}
				if (isset($link['likes']['data']))
					foreach ($link['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($close[$like['id']]))
								$close[$like['id']] = 0;
							$close[$like['id']]++;
						}
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($close[$photo['from']['id']]))
					$close[$photo['from']['id']] = 0;
				$close[$photo['from']['id']]++;
				if (isset($photo['tags']['data']))
					foreach ($photo['tags']['data'] as $tag)
						if (isset($tag['id'])) {
							if (!isset($close[$tag['id']]))
								$close[$tag['id']] = 0;
							$close[$tag['id']]++;
						}
				if (isset($photo['comments']['data']))
					foreach ($photo['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($close[$comment['from']['id']]))
								$close[$comment['from']['id']] = 0;
							$close[$comment['from']['id']]++;
						}
				if (isset($photo['likes']['data']))
					foreach ($photo['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($close[$like['id']]))
								$close[$like['id']] = 0;
							$close[$like['id']]++;
						}
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (isset($post['comments']['data']))
					foreach ($post['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($close[$comment['from']['id']]))
								$close[$comment['from']['id']] = 0;
							$close[$comment['from']['id']]++;
						}
				if (isset($post['likes']['data']))
					foreach ($post['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($close[$like['id']]))
								$close[$like['id']] = 0;
							$close[$like['id']]++;
						}
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($close[$status['from']['id']]))
					$close[$status['from']['id']] = 0;
				$close[$status['from']['id']]++;
				if (isset($status['to']['data']))
					foreach ($status['to']['data'] as $to) {
						if (!isset($close[$to['id']]))
							$close[$to['id']] = 0;
						$close[$to['id']]++;
					}
				if (isset($status['comments']['data']))
					foreach ($status['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($close[$comment['from']['id']]))
								$close[$comment['from']['id']] = 0;
							$close[$comment['from']['id']]++;
						}
				if (isset($status['likes']['data']))
					foreach ($status['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($close[$like['id']]))
								$close[$like['id']] = 0;
							$close[$like['id']]++;
						}
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($close[$tagged['from']['id']]))
					$close[$tagged['from']['id']] = 0;
				$close[$tagged['from']['id']]++;
				if (isset($tagged['to']['data']))
					foreach ($tagged['to']['data'] as $to) {
						if (!isset($close[$to['id']]))
							$close[$to['id']] = 0;
						$close[$to['id']]++;
					}
				if (isset($tagged['comments']['data']))
					foreach ($tagged['comments']['data'] as $comment)
						if (isset($comment['from']['id'])) {
							if (!isset($close[$comment['from']['id']]))
								$close[$comment['from']['id']] = 0;
							$close[$comment['from']['id']]++;
						}
				if (isset($tagged['likes']['data']))
					foreach ($tagged['likes']['data'] as $like)
						if (isset($like['id'])) {
							if (!isset($close[$like['id']]))
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

	private function school_friends(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = [];
		foreach ($data['profile']['education'] as $education)
			if ((isset($education['school']['id'], $education['type'])) && ($education['type'] === 'High School'))
				$educations[] = $education['school']['id'];

		$friends = $this->_friends($data);
		$return = 0;
		foreach ($friends as $friend) {
			if (empty($friend['education']))
				continue;
			foreach ($friend['education'] as $education)
				if ((isset($education['school']['id'])) && (in_array($education['school']['id'], $educations)))
					$return++;
		}
		return $return;
	}

	private function college_friends(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = [];
		foreach ($data['profile']['education'] as $education)
			if ((isset($education['school']['id'], $education['type'])) && ($education['type'] === 'College'))
				$educations[] = $education['school']['id'];

		$friends = $this->_friends($data);
		$return = 0;
		foreach ($friends as $friend) {
			if (empty($friend['education']))
				continue;
			foreach ($friend['education'] as $education)
				if ((isset($education['school']['id'])) && (in_array($education['school']['id'], $educations)))
					$return++;
		}
		return $return;
	}

	private function num_coworkers(&$data) {
		if ((empty($data['profile']['work'])) || (empty($data['friends'])))
			return 0;

		$companies = [];

		foreach ($data['profile']['work'] as $company)
			if (isset($company['employer']['id']))
				$companies[] = $company['employer']['id'];

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_events(&$data) {
		if (empty($data['events']))
			return 0;
		return count($data['events']);
	}

	private function num_events_attended(&$data) {
		if (empty($data['events']))
			return 0;
		$return = 0;
		foreach ($data['events'] as $event)
			if ((isset($event['rsvp_status'])) && (strtolower($event['rsvp_status']) === 'attending'))
				$return++;
		return $return;
	}

	private function num_groups(&$data) {
		if (empty($data['groups']))
			return 0;
		return count($data['groups']);
	}

	private function num_groups_administrating(&$data) {
		if (empty($data['groups']))
			return 0;
		$return = 0;
		foreach ($data['groups'] as $group)
			if ((isset($group['administrator'])) && ($group['administrator']))
				$return++;
		return $return;
	}

	private function num_likes(&$data) {
		if (empty($data['likes']))
			return 0;
		return count($data['likes']);
	}

	private function num_locations(&$data) {
		if (empty($data['locations']))
			return 0;
		return count($data['locations']);
	}

	private function num_links(&$data) {
		if (empty($data['links']))
			return 0;
		return count($data['links']);
	}

	private function num_photos(&$data) {
		if (empty($data['photos']))
			return 0;
		return count($data['photos']);
	}

	private function num_posts(&$data) {
		if (empty($data['posts']))
			return 0;
		return count($data['posts']);
	}

	private function num_statuses(&$data) {
		if (empty($data['statuses']))
			return 0;
		return count($data['statuses']);
	}

	private function num_tagged(&$data) {
		if (empty($data['tagged']))
			return 0;
		return count($data['tagged']);
	}

	private function profile_age(&$data) {
		$age = null;
		foreach (array('links', 'photos', 'posts', 'statuses', 'tagged') as $property)
			if (!empty($data[$property]))
				foreach ($data[$property] as $item) {
					if (empty($item['created_time']))
						$timestamp = strtotime($item['updated_time']);
					else
						$timestamp = strtotime($item['created_time']);
					if ($timestamp === false)
						continue;
					if ((is_null($age)) || ($timestamp < $age))
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

	private function first_most_recent_education(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[0]['name']))
			return null;
		return $educations[0]['name'];
	}

	private function second_most_recent_education(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[1]['name']))
			return null;
		return $educations[1]['name'];
	}

	private function third_most_recent_education(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[2]['name']))
			return null;
		return $educations[2]['name'];
	}

	private function first_most_recent_education_type(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[0]['type']))
			return null;
		return $educations[0]['type'];
	}

	private function second_most_recent_education_type(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[1]['type']))
			return null;
		return $educations[1]['type'];
	}

	private function third_most_recent_education_type(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[2]['type']))
			return null;
		return $educations[2]['type'];
	}

	private function first_most_recent_education_course(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[0]['course']))
			return null;
		return $educations[0]['course'];
	}

	private function second_most_recent_education_course(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[1]['course']))
			return null;
		return $educations[1]['course'];
	}

	private function third_most_recent_education_course(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[2]['course']))
			return null;
		return $educations[2]['course'];
	}

	private function first_most_recent_education_graduation_year(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[0]['year']))
			return null;
		return $educations[0]['year'];
	}

	private function second_most_recent_education_graduation_year(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[1]['year']))
			return null;
		return $educations[1]['year'];
	}

	private function third_most_recent_education_graduation_year(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[2]['year']))
			return null;
		return $educations[2]['year'];
	}

	private function first_most_recent_education_graduated(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[0]['year']))
			return null;
		return ($educations[0]['year'] < date('Y'));
	}

	private function second_most_recent_education_graduated(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[1]['year']))
			return null;
		return ($educations[1]['year'] < date('Y'));
	}

	private function third_most_recent_education_graduated(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[2]['year']))
			return null;
		return ($educations[2]['year'] < date('Y'));
	}

	private function num_friends_first_most_recent_education(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[0]['id']))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_second_most_recent_education(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[1]['id']))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_third_most_recent_education(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[2]['id']))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_first_most_recent_education_same_graduation_year(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if ((empty($educations[0]['id'])) || (empty($educations[0]['year'])))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_second_most_recent_education_same_graduation_year(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if ((empty($educations[1]['id'])) || (empty($educations[1]['year'])))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_third_most_recent_education_same_graduation_year(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if ((empty($educations[2]['id'])) || (empty($educations[2]['year'])))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_working_first_most_recent_education(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[0]['id']))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_working_second_most_recent_education(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[1]['id']))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_friends_working_third_most_recent_education(&$data) {
		if ((empty($data['profile']['education'])) || (empty($data['friends'])))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[2]['id']))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_checkins_first_most_recent_education_this_year(&$data) {
		if (empty($data['profile']['education']))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[0]['id']))
			return 0;

		$year = date('Y');

		$return = 0;
		if (!empty($data['locations']))
			foreach ($data['locations'] as $location) {
				if (!isset($location['created_time'], $location['place']['id']))
					continue;

				if ($location['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($location['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($link['created_time'], $link['place']['id']))
					continue;

				if ($link['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($link['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($photo['created_time'], $photo['place']['id']))
					continue;

				if ($photo['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($photo['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (!isset($post['created_time'], $post['place']['id']))
					continue;

				if ($post['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($post['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($status['created_time'], $status['place']['id']))
					continue;

				if ($status['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($status['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($tagged['created_time'], $tagged['place']['id']))
					continue;

				if ($tagged['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($tagged['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		return $return;
	}

	private function num_checkins_second_most_recent_education_this_year(&$data) {
		if (empty($data['profile']['education']))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[1]['id']))
			return 0;

		$year = date('Y');

		$return = 0;
		if (!empty($data['locations']))
			foreach ($data['locations'] as $location) {
				if (!isset($location['created_time'], $location['place']['id']))
					continue;

				if ($location['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($location['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($link['created_time'], $link['place']['id']))
					continue;

				if ($link['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($link['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($photo['created_time'], $photo['place']['id']))
					continue;

				if ($photo['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($photo['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (!isset($post['created_time'], $post['place']['id']))
					continue;

				if ($post['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($post['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($status['created_time'], $status['place']['id']))
					continue;

				if ($status['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($status['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($tagged['created_time'], $tagged['place']['id']))
					continue;

				if ($tagged['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($tagged['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		return $return;
	}

	private function num_checkins_third_most_recent_education_this_year(&$data) {
		if (empty($data['profile']['education']))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[2]['id']))
			return 0;

		$year = date('Y');

		$return = 0;
		if (!empty($data['locations']))
			foreach ($data['locations'] as $location) {
				if (!isset($location['created_time'], $location['place']['id']))
					continue;

				if ($location['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($location['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($link['created_time'], $link['place']['id']))
					continue;

				if ($link['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($link['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($photo['created_time'], $photo['place']['id']))
					continue;

				if ($photo['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($photo['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (!isset($post['created_time'], $post['place']['id']))
					continue;

				if ($post['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($post['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($status['created_time'], $status['place']['id']))
					continue;

				if ($status['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($status['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($tagged['created_time'], $tagged['place']['id']))
					continue;

				if ($tagged['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($tagged['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		return $return;
	}

	private function num_checkins_first_most_recent_education_last_year(&$data) {
		if (empty($data['profile']['education']))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[0]['id']))
			return 0;

		$year = (date('Y') - 1);

		$return = 0;
		if (!empty($data['locations']))
			foreach ($data['locations'] as $location) {
				if (!isset($location['created_time'], $location['place']['id']))
					continue;

				if ($location['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($location['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($link['created_time'], $link['place']['id']))
					continue;

				if ($link['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($link['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($photo['created_time'], $photo['place']['id']))
					continue;

				if ($photo['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($photo['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (!isset($post['created_time'], $post['place']['id']))
					continue;

				if ($post['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($post['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($status['created_time'], $status['place']['id']))
					continue;

				if ($status['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($status['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($tagged['created_time'], $tagged['place']['id']))
					continue;

				if ($tagged['place']['id'] !== $educations[0]['id'])
					continue;

				$ts = strtotime($tagged['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		return $return;
	}

	private function num_checkins_second_most_recent_education_last_year(&$data) {
		if (empty($data['profile']['education']))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[1]['id']))
			return 0;

		$year = (date('Y') - 1);

		$return = 0;
		if (!empty($data['locations']))
			foreach ($data['locations'] as $location) {
				if (!isset($location['created_time'], $location['place']['id']))
					continue;

				if ($location['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($location['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($link['created_time'], $link['place']['id']))
					continue;

				if ($link['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($link['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($photo['created_time'], $photo['place']['id']))
					continue;

				if ($photo['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($photo['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (!isset($post['created_time'], $post['place']['id']))
					continue;

				if ($post['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($post['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($status['created_time'], $status['place']['id']))
					continue;

				if ($status['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($status['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($tagged['created_time'], $tagged['place']['id']))
					continue;

				if ($tagged['place']['id'] !== $educations[1]['id'])
					continue;

				$ts = strtotime($tagged['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		return $return;
	}

	private function num_checkins_third_most_recent_education_last_year(&$data) {
		if (empty($data['profile']['education']))
			return 0;

		$educations = $this->_education($data);

		if (empty($educations[2]['id']))
			return 0;

		$year = (date('Y') - 1);

		$return = 0;
		if (!empty($data['locations']))
			foreach ($data['locations'] as $location) {
				if (!isset($location['created_time'], $location['place']['id']))
					continue;

				if ($location['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($location['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['links']))
			foreach ($data['links'] as $link) {
				if (!isset($link['created_time'], $link['place']['id']))
					continue;

				if ($link['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($link['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['photos']))
			foreach ($data['photos'] as $photo) {
				if (!isset($photo['created_time'], $photo['place']['id']))
					continue;

				if ($photo['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($photo['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['posts']))
			foreach ($data['posts'] as $post) {
				if (!isset($post['created_time'], $post['place']['id']))
					continue;

				if ($post['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($post['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['statuses']))
			foreach ($data['statuses'] as $status) {
				if (!isset($status['created_time'], $status['place']['id']))
					continue;

				if ($status['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($status['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		if (!empty($data['tagged']))
			foreach ($data['tagged'] as $tagged) {
				if (!isset($tagged['created_time'], $tagged['place']['id']))
					continue;

				if ($tagged['place']['id'] !== $educations[2]['id'])
					continue;

				$ts = strtotime($tagged['created_time']);
				if (date('Y', $ts) == $year)
					$return++;
			}

		return $return;
	}

	private function num_student_friends(&$data) {
		if (empty($data['friends']))
			return 0;

		$year = date('Y');

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_student_friends_same_age(&$data) {
		if (empty($data['friends']))
			return 0;

		$birthYear = $this->birth($data, 2);
		if (empty($birthYear))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_student_friends_within_one_year_age_difference(&$data) {
		if (empty($data['friends']))
			return 0;

		$birthYear = $this->birth($data, 2);
		if (empty($birthYear))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_student_friends_within_two_years_age_difference(&$data) {
		if (empty($data['friends']))
			return 0;

		$birthYear = $this->birth($data, 2);
		if (empty($birthYear))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function num_student_friends_within_three_years_age_difference(&$data) {
		if (empty($data['friends']))
			return 0;

		$birthYear = $this->birth($data, 2);
		if (empty($birthYear))
			return 0;

		$friends = $this->_friends($data);
		$return = 0;
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

	private function is_student(&$data) {
		if (empty($data['profile']['education']))
			return null;

		$educations = $this->_education($data);

		if (empty($educations[0]['year']))
			return false;
		return ($educations[0]['year'] >= date('Y'));
	}

	private function is_student_age(&$data) {
		$birthYear = $this->birth($data, 2);
		if (empty($birthYear))
			return null;

		$age = (date('Y') - $birthYear);

		//from 10 to 18 for mid/high school
		//from 18 to 25 for college
		return (($age >= 10) && ($age <= 25));
	}

	private function is_in_relationship(&$data) {
		if (empty($data['relationship_status']))
			return false;

		return in_array($data['relationship_status'], array('In a relationship', 'Engaged', 'Married', 'In a civil union', 'In a domestic partnership', 'In an open relationship', 'It\'s complicated'));
	}

	private function significant_other(&$data) {
		if (empty($data['profile']['significant_other']['name']))
			return null;

		return $data['profile']['significant_other']['name'];
	}

	private function first_most_recent_employer(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[0]['employer']))
			return null;
		return $works[0]['employer'];
	}

	private function second_most_recent_employer(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[1]['employer']))
			return null;
		return $works[1]['employer'];
	}

	private function third_most_recent_employer(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[2]['employer']))
			return null;
		return $works[2]['employer'];
	}

	private function fourth_most_recent_employer(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[3]['employer']))
			return null;
		return $works[3]['employer'];
	}

	private function fifth_most_recent_employer(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[4]['employer']))
			return null;
		return $works[4]['employer'];
	}

	private function first_most_recent_work_position(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[0]['position']))
			return null;
		return $works[0]['position'];
	}

	private function second_most_recent_work_position(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[1]['position']))
			return null;
		return $works[1]['position'];
	}

	private function third_most_recent_work_position(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[2]['position']))
			return null;
		return $works[2]['position'];
	}

	private function fourth_most_recent_work_position(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[3]['position']))
			return null;
		return $works[3]['position'];
	}

	private function fifth_most_recent_work_position(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[4]['position']))
			return null;
		return $works[4]['position'];
	}

	private function first_most_recent_work_location(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[0]['location']))
			return null;
		return $works[0]['location'];
	}

	private function second_most_recent_work_location(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[1]['location']))
			return null;
		return $works[1]['location'];
	}

	private function third_most_recent_work_location(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[2]['location']))
			return null;
		return $works[2]['location'];
	}

	private function fourth_most_recent_work_location(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[3]['location']))
			return null;
		return $works[3]['location'];
	}

	private function fifth_most_recent_work_location(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[4]['location']))
			return null;
		return $works[4]['location'];
	}

	private function first_most_recent_work_has_projects(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (isset($works[0]['has_projects']))
			return $works[0]['has_projects'];
		return null;
	}

	private function second_most_recent_work_has_projects(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (isset($works[1]['has_projects']))
			return $works[1]['has_projects'];
		return null;
	}

	private function third_most_recent_work_has_projects(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (isset($works[2]['has_projects']))
			return $works[2]['has_projects'];
		return null;
	}

	private function fourth_most_recent_work_has_projects(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (isset($works[3]['has_projects']))
			return $works[3]['has_projects'];
		return null;
	}

	private function fifth_most_recent_work_has_projects(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (isset($works[4]['has_projects']))
			return $works[4]['has_projects'];
		return null;
	}

	private function first_most_recent_work_is_current(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[0]))
			return null;
		return empty($works[0]['end_date']);
	}

	private function second_most_recent_work_is_current(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[1]))
			return null;
		return empty($works[1]['end_date']);
	}

	private function third_most_recent_work_is_current(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[2]))
			return null;
		return empty($works[2]['end_date']);
	}

	private function fourth_most_recent_work_is_current(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[3]))
			return null;
		return empty($works[3]['end_date']);
	}

	private function fifth_most_recent_work_is_current(&$data) {
		if (empty($data['profile']['work']))
			return null;

		$works = $this->_work($data);

		if (empty($works[4]))
			return null;
		return empty($works[4]['end_date']);
	}

	public function analyze(array $data) : array {
		$facts = [];
		$facts['isActive'] = !empty($data);
		$facts['profilePicture'] = $this->profile_picture($data);
		$facts['verifiedProfile'] = $this->verified_profile($data);
		$facts['isACommonName'] = $this->is_common_name($data);
		$facts['isListedName'] = $this->is_listed_name($data);
		$facts['isFantasyName'] = $this->is_fantasy_name($data);
		$facts['isSanctionedName'] = $this->is_sanctioned_name($data);
		$facts['isPEPName'] = $this->is_pep_name($data);
		$facts['isCelebrityName'] = $this->is_celebrity_name($data);
		$facts['isSillyName'] = $this->is_silly_name($data);
		$facts['nameGender'] = $this->name_gender($data);
		$facts['fullName'] = $this->full_name($data);
		$facts['firstName'] = $this->first_name($data);
		$facts['firstNameInitial'] = $this->first_name_initial($data);
		$facts['middleName'] = $this->middle_name($data);
		$facts['middleNameInitial'] = $this->middle_name_initial($data);
		$facts['lastName'] = $this->last_name($data);
		$facts['lastNameInitial'] = $this->last_name_initial($data);
		$facts['profileGender'] = $this->profile_gender($data);
		$facts['emailAddress'] = $this->email_address($data);
		$facts['emailUsername'] = $this->email_username($data);
		$facts['pictureIsSilhouette'] = $this->picture_is_silhouette($data);
		$facts['hometownCityName'] = $this->hometown_city_name($data);
		$facts['hometownRegionName'] = $this->hometown_region_name($data);
		$facts['hometownCountryName'] = $this->hometown_country_name($data);
		$facts['currentCityName'] = $this->current_city_name($data);
		$facts['currentRegionName'] = $this->current_region_name($data);
		$facts['currentCountryName'] = $this->current_country_name($data);
		$facts['numFamilyMembersWithSameLastName'] = $this->num_family_members_same_last_name($data);
		$facts['numFriendsWithSameLastName']  = $this->num_friends_same_last_name($data);
		$facts['top1FriendsCity'] = $this->top1_friends_city($data);
		$facts['top1FriendsCountry'] = $this->top1_friends_country($data);
		$facts['top2FriendsCity'] = $this->top2_friends_city($data);
		$facts['top2FriendsCountry'] = $this->top2_friends_country($data);
		$facts['top3FriendsCity'] = $this->top3_friends_city($data);
		$facts['top3FriendsCountry'] = $this->top3_friends_country($data);
		$facts['top4FriendsCity'] = $this->top4_friends_city($data);
		$facts['top4FriendsCountry'] = $this->top4_friends_country($data);
		$facts['top5FriendsCity'] = $this->top5_friends_city($data);
		$facts['top5FriendsCountry'] = $this->top5_friends_country($data);
		$facts['mostActiveCityPastMonth'] = $this->most_active_city($data, 1);
		$facts['mostActiveCountryPastMonth'] = $this->most_active_country($data, 1);
		$facts['mostActiveCityPastSixMonths'] = $this->most_active_city($data, 6);
		$facts['mostActiveCountrySixMonths'] = $this->most_active_country($data, 6);
		$facts['mostActiveCityPastYear'] = $this->most_active_city($data, 12);
		$facts['mostActiveCountryPastYear'] = $this->most_active_country($data, 12);
		$facts['avgFriendsBirthYear'] = $this->avg_friends_birth_year($data);
		$facts['numOfFriendsBirthWithinOneYear'] = $this->num_friends_within_oneyear($data);
		$facts['numOfFriendsBirthWithinTwoYears'] = $this->num_friends_within_twoyears($data);
		$facts['numOfFriendsBirthWithinThreeYears'] = $this->num_friends_within_threeyears($data);
		$facts['numOfFriendsBirthWithinFourYears'] = $this->num_friends_within_fouryears($data);
		$facts['numOfFriendsBirthWithinFiveYears'] = $this->num_friends_within_fiveyears($data);
		$facts['avgPostsPerWeek'] = $this->avg_posts_week($data);
		$facts['avgCommentsReceivedPerWeek'] = $this->avg_comments_week($data);
		$facts['avgLikesPerWeek'] = $this->avg_likes_week($data);
		$facts['numOfReceivedComments'] = $this->num_comments_received($data);
		$facts['numOfReceivedLikes'] = $this->num_likes_received($data);
		$facts['numOfFamilyMembers'] = $this->num_family_members($data);
		$facts['numOfFriends'] = $this->num_friends($data);
		$facts['numOfCloseFriends'] = $this->close_friends($data);
		$facts['numOfSchoolFriends'] = $this->school_friends($data);
		$facts['numOfCollegeFriends'] = $this->college_friends($data);
		$facts['numOfCoworkers'] = $this->num_coworkers($data);
		$facts['numOfEvents'] = $this->num_events($data);
		$facts['numOfEventsAttended'] = $this->num_events_attended($data);
		$facts['numOfGroups'] = $this->num_groups($data);
		$facts['numOfGroupsAdministrating'] = $this->num_groups_administrating($data);
		$facts['numOfLikes'] = $this->num_likes($data);
		$facts['numOfLocations'] = $this->num_locations($data);
		$facts['numOfLinks'] = $this->num_links($data);
		$facts['numOfPhotos'] = $this->num_photos($data);
		$facts['numOfPosts'] = $this->num_posts($data);
		$facts['numOfStatuses'] = $this->num_statuses($data);
		$facts['numOfTagged'] = $this->num_tagged($data);
		$facts['profileAge'] = $this->profile_age($data);
		$facts['birthDay'] = $this->birth($data, 1);
		$facts['birthMonth'] = $this->birth($data, 0);
		$facts['birthYear'] = $this->birth($data, 2);
		$facts['firstMostRecentEducation'] = $this->first_most_recent_education($data);
		$facts['secondMostRecentEducation'] = $this->second_most_recent_education($data);
		$facts['thirdMostRecentEducation'] = $this->third_most_recent_education($data);
		$facts['firstMostRecentEducationType'] = $this->first_most_recent_education_type($data);
		$facts['secondMostRecentEducationType'] = $this->second_most_recent_education_type($data);
		$facts['thirdMostRecentEducationType'] = $this->third_most_recent_education_type($data);
		$facts['firstMostRecentEducationCourse'] = $this->first_most_recent_education_course($data);
		$facts['secondMostRecentEducationCourse'] = $this->second_most_recent_education_course($data);
		$facts['thirdMostRecentEducationCourse'] = $this->third_most_recent_education_course($data);
		$facts['firstMostRecentEducationGraduationYear'] = $this->first_most_recent_education_graduation_year($data);
		$facts['secondMostRecentEducationGraduationYear'] = $this->second_most_recent_education_graduation_year($data);
		$facts['thirdMostRecentEducationGraduationYear'] = $this->third_most_recent_education_graduation_year($data);
		$facts['isFirstMostRecentEducationGraduated'] = $this->first_most_recent_education_graduated($data);
		$facts['isSecondMostRecentEducationGraduated'] = $this->second_most_recent_education_graduated($data);
		$facts['isThirdMostRecentEducationGraduated'] = $this->third_most_recent_education_graduated($data);
		$facts['numOfFriendsFromFirstMostRecentEducation'] = $this->num_friends_first_most_recent_education($data);
		$facts['numOfFriendsFromSecondMostRecentEducation'] = $this->num_friends_second_most_recent_education($data);
		$facts['numOfFriendsFromThirdMostRecentEducation'] = $this->num_friends_third_most_recent_education($data);
		$facts['numOfFriendsFromFirstMostRecentEducationWithSameGraduationYear'] = $this->num_friends_first_most_recent_education_same_graduation_year($data);
		$facts['numOfFriendsFromSecondMostRecentEducationWithSameGraduationYear'] = $this->num_friends_second_most_recent_education_same_graduation_year($data);
		$facts['numOfFriendsFromThirdMostRecentEducationWithSameGraduationYear'] = $this->num_friends_third_most_recent_education_same_graduation_year($data);
		$facts['numOfFriendsWorkingAtFirstMostRecentEducation'] = $this->num_friends_working_first_most_recent_education($data);
		$facts['numOfFriendsWorkingAtSecondMostRecentEducation'] = $this->num_friends_working_second_most_recent_education($data);
		$facts['numOfFriendsWorkingAtThirdMostRecentEducation'] = $this->num_friends_working_third_most_recent_education($data);
		$facts['numOfCheckinsAtFirstMostRecentEducationThisYear'] = $this->num_checkins_first_most_recent_education_this_year($data);
		$facts['numOfCheckinsAtSecondMostRecentEducationThisYear'] = $this->num_checkins_second_most_recent_education_this_year($data);
		$facts['numOfCheckinsAtThirdMostRecentEducationThisYear'] = $this->num_checkins_third_most_recent_education_this_year($data);
		$facts['numOfCheckinsAtFirstMostRecentEducationLastYear'] = $this->num_checkins_first_most_recent_education_last_year($data);
		$facts['numOfCheckinsAtSecondMostRecentEducationLastYear'] = $this->num_checkins_second_most_recent_education_last_year($data);
		$facts['numOfCheckinsAtThirdMostRecentEducationLastYear'] = $this->num_checkins_third_most_recent_education_last_year($data);
		$facts['numOfStudentFriends'] = $this->num_student_friends($data);
		$facts['numOfStudentFriendsWithSameAge'] = $this->num_student_friends_same_age($data);
		$facts['numOfStudentFriendsWithinOneYearAgeDifference'] = $this->num_student_friends_within_one_year_age_difference($data);
		$facts['numOfStudentFriendsWithinTwoYearsAgeDifference'] = $this->num_student_friends_within_two_years_age_difference($data);
		$facts['numOfStudentFriendsWithinThreeYearsAgeDifference'] = $this->num_student_friends_within_three_years_age_difference($data);
		$facts['isAStudent'] = $this->is_student($data);
		$facts['isWithinStudentAge'] = $this->is_student_age($data);
		$facts['isInARelationship'] = $this->is_in_relationship($data);
		$facts['significantOther'] = $this->significant_other($data);
		$facts['firstMostRecentEmployer'] = $this->first_most_recent_employer($data);
		$facts['secondMostRecentEmployer'] = $this->second_most_recent_employer($data);
		$facts['thirdMostRecentEmployer'] = $this->third_most_recent_employer($data);
		$facts['fourthMostRecentEmployer'] = $this->fourth_most_recent_employer($data);
		$facts['fifthMostRecentEmployer'] = $this->fifth_most_recent_employer($data);
		$facts['firstMostRecentWorkPosition'] = $this->first_most_recent_work_position($data);
		$facts['secondMostRecentWorkPosition'] = $this->second_most_recent_work_position($data);
		$facts['thirdMostRecentWorkPosition'] = $this->third_most_recent_work_position($data);
		$facts['fourthMostRecentWorkPosition'] = $this->fourth_most_recent_work_position($data);
		$facts['fifthMostRecentWorkPosition'] = $this->fifth_most_recent_work_position($data);
		$facts['firstMostRecentWorkLocation'] = $this->first_most_recent_work_location($data);
		$facts['secondMostRecentWorkLocation'] = $this->second_most_recent_work_location($data);
		$facts['thirdMostRecentWorkLocation'] = $this->third_most_recent_work_location($data);
		$facts['fourthMostRecentWorkLocation'] = $this->fourth_most_recent_work_location($data);
		$facts['fifthMostRecentWorkLocation'] = $this->fifth_most_recent_work_location($data);
		$facts['firstMostRecentWorkHasProjects'] = $this->first_most_recent_work_has_projects($data);
		$facts['secondMostRecentWorkHasProjects'] = $this->second_most_recent_work_has_projects($data);
		$facts['thirdMostRecentWorkHasProjects'] = $this->third_most_recent_work_has_projects($data);
		$facts['fourthMostRecentWorkHasProjects'] = $this->fourth_most_recent_work_has_projects($data);
		$facts['fifthMostRecentWorkHasProjects'] = $this->fifth_most_recent_work_has_projects($data);
		$facts['firstMostRecentWorkIsCurrent'] = $this->first_most_recent_work_is_current($data);
		$facts['secondMostRecentWorkIsCurrent'] = $this->second_most_recent_work_is_current($data);
		$facts['thirdMostRecentWorkIsCurrent'] = $this->third_most_recent_work_is_current($data);
		$facts['fourthMostRecentWorkIsCurrent'] = $this->fourth_most_recent_work_is_current($data);
		$facts['fifthMostRecentWorkIsCurrent'] = $this->fifth_most_recent_work_is_current($data);

		return $facts;
	}

}