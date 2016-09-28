<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsWorkingFirstMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['profile'])) {
            return 0;
        }

        $profile = $this->worker->rawBuffer['profile'];
        if (empty($profile['education'])) {
            return 0;
        }

        $education = $this->worker->rawBuffer['_education'];
        if (empty($education[0]['id'])) {
            return 0;
        }

        $friends = $this->worker->rawBuffer['friends'];
        if (empty($friends)) {
            return 0;
        }

        $count = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work'])) {
                continue;
            }

            foreach ($friend['work'] as $work) {
                if (isset($work['employer']['id']) && $work['employer']['id'] === $education[0]['id']) {
                    $count++;
                    break;
                }
            }
        }

        return $count;
    }
}
