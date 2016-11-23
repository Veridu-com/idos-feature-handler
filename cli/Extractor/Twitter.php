<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Twitter extends AbstractExtractor {
    private function profile_id(&$data) {
        if (empty($data['profile']['id_str'])) {
            return false;
        }

        return $data['profile']['id_str'];
    }

    private function profile_picture(&$data) {
        if (empty($data['profile']['profile_image_url_https'])) {
            return false;
        }

        return preg_replace('/(_(normal|bigger|mini))(\..*?)$/', '$3', $data['profile']['profile_image_url_https']);
    }

    private function profile_url(&$data) {
        if (empty($data['profile']['screen_name'])) {
            return false;
        }

        return sprintf('https://twitter.com/%s', $data['profile']['screen_name']);
    }

    private function is_common_name(&$data) {
        $name = $this->first_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isCommonName($name);
    }

    private function is_listed_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isListedName($name);
    }

    private function is_fantasy_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isFantasyName($name);
    }

    private function is_sanctioned_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isSanctionedName($name);
    }

    private function is_pep_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isPEPName($name);
    }

    private function is_celebrity_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isCelebrityName($name);
    }

    private function is_silly_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isSillyName($name);
    }

    private function name_gender(&$data) {
        $name = $this->first_name($data);
        if (is_null($name)) {
            return;
        }

        return Utils::getInstance()->nameGender($name);
    }

    private function full_name(&$data) {
        if (empty($data['profile']['name'])) {
            return;
        }

        return $data['profile']['name'];
    }

    private function first_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name)) {
            return;
        }

        return Utils::getInstance()->firstName($name);
    }

    private function first_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name)) {
            return;
        }

        return Utils::getInstance()->firstNameInitial($name);
    }

    private function middle_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name)) {
            return;
        }

        return Utils::getInstance()->middleName($name);
    }

    private function middle_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name)) {
            return;
        }

        return Utils::getInstance()->middleNameInitial($name);
    }

    private function last_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name)) {
            return;
        }

        return Utils::getInstance()->lastName($name);
    }

    private function last_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name)) {
            return;
        }

        return Utils::getInstance()->lastNameInitial($name);
    }

    private function num_friends(&$data) {
        if (empty($data['profile']['friends_count'])) {
            return 0;
        }

        return $data['profile']['friends_count'];
    }

    private function num_followers(&$data) {
        if (empty($data['profile']['followers_count'])) {
            return 0;
        }

        return $data['profile']['followers_count'];
    }

    private function num_tweets(&$data) {
        if (empty($data['profile']['statuses_count'])) {
            return 0;
        }

        return $data['profile']['statuses_count'];
    }

    private function avg_tweet_week(&$data) {
        if (empty($data['statuses'])) {
            return;
        }

        $statuses = [];
        foreach ($data['statuses'] as $status) {
            $ts = strtotime($status['created_at']);
            if ($ts === false) {
                continue;
            }

            if (! isset($statuses[date('Y', $ts)])) {
                $statuses[date('Y', $ts)] = [];
            }

            if (! isset($statuses[date('Y', $ts)][date('n', $ts)])) {
                $statuses[date('Y', $ts)][date('n', $ts)] = 0;
            }

            $statuses[date('Y', $ts)][date('n', $ts)]++;
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($statuses as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month'])) {
                    break;
                }

                if (isset($months[$i])) {
                    $months[$i] = round($months[$i] / 4, 2);
                } else {
                    $months[$i] = 0;
                }
            }

            ksort($months);
        }

        ksort($statuses);

        return $statuses;
    }

    private function avg_retweeted_week(&$data) {
        if (empty($data['statuses'])) {
            return;
        }

        $statuses = [];
        foreach ($data['statuses'] as $status) {
            $ts = strtotime($status['created_at']);
            if ($ts === false) {
                continue;
            }

            if ((! $status['favorited']) && (! $status['retweeted']) && (! empty($status['retweet_count']))) {
                if (! isset($statuses[date('Y', $ts)])) {
                    $statuses[date('Y', $ts)] = [];
                }

                if (! isset($statuses[date('Y', $ts)][date('n', $ts)])) {
                    $statuses[date('Y', $ts)][date('n', $ts)] = 0;
                }

                $statuses[date('Y', $ts)][date('n', $ts)] += $status['retweet_count'];
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($statuses as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month'])) {
                    break;
                }

                if (isset($months[$i])) {
                    $months[$i] = round($months[$i] / 4, 2);
                } else {
                    $months[$i] = 0;
                }
            }

            ksort($months);
        }

        ksort($statuses);

        return $statuses;
    }

    private function avg_favorited_week(&$data) {
        if (empty($data['statuses'])) {
            return;
        }

        $statuses = [];
        foreach ($data['statuses'] as $status) {
            $ts = strtotime($status['created_at']);
            if ($ts === false) {
                continue;
            }

            if ((! $status['favorited']) && (! $status['retweeted']) && (! empty($status['favorite_count']))) {
                if (! isset($statuses[date('Y', $ts)])) {
                    $statuses[date('Y', $ts)] = [];
                }

                if (! isset($statuses[date('Y', $ts)][date('n', $ts)])) {
                    $statuses[date('Y', $ts)][date('n', $ts)] = 0;
                }

                $statuses[date('Y', $ts)][date('n', $ts)] += $status['favorite_count'];
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($statuses as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month'])) {
                    break;
                }

                if (isset($months[$i])) {
                    $months[$i] = round($months[$i] / 4, 2);
                } else {
                    $months[$i] = 0;
                }
            }

            ksort($months);
        }

        ksort($statuses);

        return $statuses;
    }

    private function num_received_retweets(&$data) {
        if (empty($data['statuses'])) {
            return 0;
        }

        $count = 0;
        foreach ($data['statuses'] as $status) {
            if ((empty($status['favorited'])) && (empty($status['retweeted'])) && (! empty($status['retweet_count']))) {
                $count += $status['retweet_count'];
            }
        }

        return $count;
    }

    private function num_received_favorites(&$data) {
        if (empty($data['statuses'])) {
            return 0;
        }

        $count = 0;
        foreach ($data['statuses'] as $status) {
            if ((empty($status['favorited'])) && (empty($status['retweeted'])) && (! empty($status['favorite_count']))) {
                $count += $status['favorite_count'];
            }
        }

        return $count;
    }

    private function num_retweeted(&$data) {
        if (empty($data['statuses'])) {
            return 0;
        }

        $count = 0;
        foreach ($data['statuses'] as $status) {
            if ((empty($status['favorited'])) && (empty($status['retweeted'])) && (! empty($status['retweet_count']))) {
                $count++;
            }
        }

        return $count;
    }

    private function num_favorited(&$data) {
        if (empty($data['statuses'])) {
            return 0;
        }

        $count = 0;
        foreach ($data['statuses'] as $status) {
            if ((empty($status['favorited'])) && (empty($status['retweeted'])) && (! empty($status['favorite_count']))) {
                $count++;
            }
        }

        return $count;
    }

    private function profile_age(&$data) {
        if (empty($data['profile']['created_at'])) {
            return;
        }

        $timestamp = strtotime($data['profile']['created_at']);
        if ($timestamp === false) {
            return;
        }

        return $timestamp;
    }

    private function is_verified(&$data) {
        if (empty($data['profile']['verified'])) {
            return false;
        }

        return $data['profile']['verified'];
    }

    private function default_profile(&$data) {
        if (empty($data['profile']['default_profile'])) {
            return false;
        }

        return $data['profile']['default_profile'];
    }

    private function default_picture(&$data) {
        if (empty($data['profile']['default_profile_image'])) {
            return false;
        }

        return $data['profile']['default_profile_image'];
    }

    private function is_translator(&$data) {
        if (empty($data['profile']['is_translator'])) {
            return false;
        }

        return $data['profile']['is_translator'];
    }

    private function profile_location(&$data) {
        if (empty($data['profile']['location'])) {
            return;
        }

        return $data['profile']['location'];
    }

    private function geo_enabled(&$data) {
        if (empty($data['profile']['geo_enabled'])) {
            return false;
        }

        return $data['profile']['geo_enabled'];
    }

    private function profile_num_listed(&$data) {
        if (empty($data['profile']['listed_count'])) {
            return 0;
        }

        return $data['profile']['listed_count'];
    }

    private function profile_num_favorite(&$data) {
        if (empty($data['profile']['favorite_count'])) {
            return 0;
        }

        return $data['profile']['favorite_count'];
    }

    public function analyze(array $data) : array {
        return [
            'isActive'               => ! empty($data),
            'profileId'              => $this->profile_id($data),
            'profilePicture'         => $this->profile_picture($data),
            'profileURL'             => $this->profile_url($data),
            'isACommonName'          => $this->is_common_name($data),
            'isListedName'           => $this->is_listed_name($data),
            'isFantasyName'          => $this->is_fantasy_name($data),
            'isSanctionedName'       => $this->is_sanctioned_name($data),
            'isPEPName'              => $this->is_pep_name($data),
            'isCelebrityName'        => $this->is_celebrity_name($data),
            'isSillyName'            => $this->is_silly_name($data),
            'nameGender'             => $this->name_gender($data),
            'fullName'               => $this->full_name($data),
            'firstName'              => $this->first_name($data),
            'firstNameInitial'       => $this->first_name_initial($data),
            'middleName'             => $this->middle_name($data),
            'middleNameInitial'      => $this->middle_name_initial($data),
            'lastName'               => $this->last_name($data),
            'lastNameInitial'        => $this->last_name_initial($data),
            'numOfFriends'           => $this->num_friends($data),
            'numOfFollowers'         => $this->num_followers($data),
            'numOfTweets'            => $this->num_tweets($data),
            'avgTweetsPerWeek'       => $this->avg_tweet_week($data),
            'avgRetweetedPerWeek'    => $this->avg_retweeted_week($data),
            'avgFavoritedPerWeek'    => $this->avg_favorited_week($data),
            'numOfReceivedRetweets'  => $this->num_received_retweets($data),
            'numOfReceivedFavorites' => $this->num_received_favorites($data),
            'numOfRetweetedTweets'   => $this->num_retweeted($data),
            'numOfFavoritedTweets'   => $this->num_favorited($data),
            'profileAge'             => $this->profile_age($data),
            'isVerified'             => $this->is_verified($data),
            'isDefaultProfile'       => $this->default_profile($data),
            'isDefaultPicture'       => $this->default_picture($data),
            'isTranslator'           => $this->is_translator($data),
            'profileLocation'        => $this->profile_location($data),
            'geoEnabled'             => $this->geo_enabled($data),
            'profileNumListed'       => $this->profile_num_listed($data),
            'profileNumFavorite'     => $this->profile_num_favorite($data)
        ];
    }
}
