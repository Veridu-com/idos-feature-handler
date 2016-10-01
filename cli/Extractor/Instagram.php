<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

final class Instagram extends AbstractExtractor {
    private function profile_picture(&$data) {
        if (empty($data['profile']['profile_picture']))
            return;

        return $data['profile']['profile_picture'];
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
        if (empty($data['profile']['full_name']))
            return;

        return $data['profile']['full_name'];
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

    private function num_follows(&$data) {
        if (empty($data['profile']['counts']['follows']))
            return 0;

        return $data['profile']['counts']['follows'];
    }

    private function num_followedby(&$data) {
        if (empty($data['profile']['counts']['followed_by']))
            return 0;

        return $data['profile']['counts']['followed_by'];
    }

    private function num_media(&$data) {
        if (empty($data['profile']['counts']['media']))
            return 0;

        return $data['profile']['counts']['media'];
    }

    private function num_received_likes(&$data) {
        if (empty($data['media']))
            return 0;
        $count = 0;
        foreach($data['media']['data'] as $item)
            $count += $item['likes']['count'];

        return $count;
    }

    private function num_received_comments(&$data) {
        if(empty($data['media']))
            return 0;
        $count = 0;
        foreach($data['media']['data'] as $item) {
            $count += $item['comments']['count'];
        }

        return $count;
    }

    private function profile_age(&$data) {
        $age = null;
        if (! empty($data['media']))
        foreach ($data['media']['data'] as $item) {
            $ts = intval($item['created_time']);
            if ($ts === false)
            continue;
            if ((is_null($age)) || ($ts < $age))
            $age = $ts;
        }

        return $age;
    }

    private function avg_media_week(&$data) {
        if(empty($data['media']))
            return 0;

        $medias = [];
        foreach ($data['media']['data'] as $media) {
            $ts = intval($media['created_time']);
            if ($ts === false)
                continue;
            if (! isset($medias[date('Y', $ts)]))
                $medias[date('Y', $ts)] = [];
            if (! isset($medias[date('Y', $ts)][date('n', $ts)]))
                $medias[date('Y', $ts)][date('n', $ts)] = 0;
            $medias[date('Y', $ts)][date('n', $ts)]++;
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];
        foreach ($medias as $year => &$months) {
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

        ksort($medias);

        return $medias;
    }

    public function analyze(array $data) : array {
        $facts                        = [];
        $facts['isActive']            = ! empty($data);
        $facts['profilePicture']      = $this->profile_picture($data);
        $facts['isACommonName']       = $this->is_common_name($data);
        $facts['isListedName']        = $this->is_listed_name($data);
        $facts['isFantasyName']       = $this->is_fantasy_name($data);
        $facts['isSanctionedName']    = $this->is_sanctioned_name($data);
        $facts['isPEPName']           = $this->is_pep_name($data);
        $facts['isCelebrityName']     = $this->is_celebrity_name($data);
        $facts['isSillyName']         = $this->is_silly_name($data);
        $facts['nameGender']          = $this->name_gender($data);
        $facts['fullName']            = $this->full_name($data);
        $facts['firstName']           = $this->first_name($data);
        $facts['firstNameInitial']    = $this->first_name_initial($data);
        $facts['middleName']          = $this->middle_name($data);
        $facts['middleNameInitial']   = $this->middle_name_initial($data);
        $facts['lastName']            = $this->last_name($data);
        $facts['lastNameInitial']     = $this->last_name_initial($data);
        $facts['numOfFollows']        = $this->num_follows($data);
        $facts['numOfFollowedBy']     = $this->num_followedby($data);
        $facts['numOfMedia']          = $this->num_media($data);
        $facts['profileAge']          = $this->profile_age($data);
        $facts['avgMediaWeek']        = $this->avg_media_week($data);
        $facts['numReceivedLikes']    = $this->num_received_likes($data);
        $facts['numReceivedComments'] = $this->num_received_comments($data);

        return $facts;
    }
}
