<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsWorkingFirstMostRecentEducation extends AbstractExtractor {
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['education'])) {
            return 0;
        }

        $education = $this->worker->rawBuffer->waitData('_education');

        if (empty($education[0]['id'])) {
            return 0;
        }

        //@FIXME
        //$friends = $this->worker->rawBuffer->waitData('_friends');
        $friends = [];

        if (empty($friends)) {
            return 0;
        }

        $count = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work'])) {
                continue;
            }

            foreach($friend['work'] as $work) {
                if (isset($work['employer']['id']) && $work['employer']['id'] === $education[0]['id']) {
                    $return++;
                    break;
                }
            }
        }

        return $count;
    }
}
