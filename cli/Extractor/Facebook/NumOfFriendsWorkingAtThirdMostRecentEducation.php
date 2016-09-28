<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsWorkingAtThirdMostRecentEducation extends AbstractExtractor {
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

        $_education = $this->worker->rawBuffer['_education'];

        if (empty($_education[2]['id'])) {
            return 0;
        }

        $return = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work'])) {
                continue;
            }

            foreach ($friend['work'] as $work) {
                if (isset($work['employer']['id']) && ($work['employer']['id'] === $_education[2]['id'])) {
                    $return++;
                    break;
                }
            }
        }

        return $return;
    }
}
