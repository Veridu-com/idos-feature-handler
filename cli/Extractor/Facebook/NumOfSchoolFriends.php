<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfSchoolFriends extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['profile'], $this->worker->rawBuffer['friends'])) {
            return 0;
        }

        $profile = $this->worker->rawBuffer['profile'];
        $friends = $this->worker->rawBuffer['friends'];

        if (empty($profile['education']) || empty($friends)) {
            return 0;
        }

        $educations = [];
        foreach ($profile['education'] as $education) {
            if (isset($education['school']['id'], $education['type']) && $education['type'] === 'High School') {
                $educations[] = $education['school']['id'];
            }
        }

        $return = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education'])) {
                continue;
            }

            foreach ($friend['education'] as $education) {
                if (isset($education['school']['id']) && in_array($education['school']['id'], $educations)) {
                    $return++;
                }
            }
        }

        return $return;
    }
}
