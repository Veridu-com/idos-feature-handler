<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Utils;

final class Dropbox extends AbstractExtractor {
    private function is_common_name(&$data) {
        $name = $this->first_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isCommonName($name);
    }

    private function _files(&$data) {
        if (isset($data['_files']))
            return $data['_files'];

        if (empty($data['contents']))
            return [];

        $data['_files'] = [];

        foreach ($data['contents'] as $content)
        foreach ($content['contents'] as $item) {
            if ($item['is_dir'])
            continue;
            $data['_files'][] = [
            'path'     => $item['path'],
            'bytes'    => $item['bytes'],
            'modified' => $item['modified']
            ];
        }

        return $data['_files'];
    }

    private function _dirs(&$data) {
        if (isset($data['_dirs']))
            return $data['_dirs'];

        if (empty($data['contents']))
            return [];

        $data['_dirs'] = [];

        foreach ($data['contents'] as $content)
            foreach ($content['contents'] as $item)
                if ($item['is_dir'])
                    $data['_dirs'][] = [
                        'path'             => $item['path'],
                        'shared_folder_id' => isset($item['shared_folder']['shared_folder_id']) ? $item['shared_folder']['shared_folder_id'] : null,
                        'modified'         => $item['modified']
                    ];

        return $data['_dirs'];
    }

    private function profile_id(&$data) {
        if (empty($data['profile']['uid'])) {
            return;
        }

        return $data['profile']['uid'];
    }

    private function num_files(&$data) {
        $files = $this->_files($data);

        if (empty($files))
            return 0;

        return count($files);
    }

    private function num_dirs(&$data) {
        $dirs = $this->_dirs($data);

        if (empty($dirs))
            return 0;

        return count($dirs);
    }

    private function least_changed_file_date(&$data) {
        $files = $this->_files($data);

        if (empty($files))
            return;

        $date = null;

        foreach ($files as $file) {
            if (! isset($file['modified']))
                continue;

            $_date = strtotime($file['modified']);
            $date  = is_null($date) || $_date < $date ? $_date : $date;
        }

        return $date;
    }

    private function belongs_team(&$data) {
        return isset($data['profile']['team']['team_id']);
    }

    private function profile_quota(&$data) {
        if(! isset($data['profile']['quota_info']['quota']))
            return -1;

        return $data['profile']['quota_info']['quota'];
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
        if (empty($data['profile']['display_name']))
            return;

        return $data['profile']['display_name'];
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

    private function is_email_verified(&$data) {
        return isset($data['profile']['email_veirified']) ? $data['profile']['email_verified'] : false;
    }

    private function current_country_name(&$data) {
        if (empty($data['profile']['country']))
            return;

        return Utils::getInstance()->codeToCountry($data['profile']['country']);
    }

    public function analyze(array $data) : array {
        return [
            'isActive'             => ! empty($data),
            'profileId'            => $this->profile_id($data),
            'isACommonName'        => $this->is_common_name($data),
            'isListedName'         => $this->is_listed_name($data),
            'isFantasyName'        => $this->is_fantasy_name($data),
            'isSanctionedName'     => $this->is_sanctioned_name($data),
            'isPEPName'            => $this->is_pep_name($data),
            'isCelebrityName'      => $this->is_celebrity_name($data),
            'isSillyName'          => $this->is_silly_name($data),
            'nameGender'           => $this->name_gender($data),
            'fullName'             => $this->full_name($data),
            'firstName'            => $this->first_name($data),
            'firstNameInitial'     => $this->first_name_initial($data),
            'middleName'           => $this->middle_name($data),
            'middleNameInitial'    => $this->middle_name_initial($data),
            'lastName'             => $this->last_name($data),
            'lastNameInitial'      => $this->last_name_initial($data),
            'emailAddress'         => $this->email_address($data),
            'emailUsername'        => $this->email_username($data),
            'countryName'          => $this->current_country_name($data),
            'isEmailVerified'      => $this->is_email_verified($data),
            'numFiles'             => $this->num_files($data),
            'numDirectories'       => $this->num_dirs($data),
            'leastChangedFileDate' => $this->least_changed_file_date($data),
            'belongsTeam'          => $this->belongs_team($data),
            'profileQuota'         => $this->profile_quota($data)
        ];
    }
}
