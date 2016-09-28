<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsFromSecondMostRecentEducationWithSameGraduationYear extends AbstractExtractor {
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
        if (empty($_education[1]['id']) || empty($_education[1]['year'])) {
            return 0;
        }

        $return = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education'])) {
                continue;
            }

            foreach ($friend['education'] as $education) {
                if (isset($education['school']['id'], $education['year']['name'])
                    && $education['school']['id'] === $_education[1]['id']
                    && $education['year']['name'] == $_education[1]['year']
                ) {
                    $return++;
                    break;
                }
            }
        }

        return $return;
    }
}
