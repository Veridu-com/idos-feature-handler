<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsFromThirdMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        $friends = $this->worker->rawBuffer->getData('friends');

        if (empty($profile['education']) || empty($friends)) {
            return 0;
        }

        $_education = $this->worker->rawBuffer->getData('_education');

        if (empty($_education[2]['id'])) {
            return 0;
        }

        $_friends = $this->worker->rawBuffer->getData('_friends');
        $return   = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education'])) {
                continue;
            }

            foreach ($friend['education'] as $education) {
                if ((isset($education['school']['id'])) && ($education['school']['id'] === $_education[2]['id'])) {
                    $return++;
                    break;
                }
            }
        }

        return $return;
    }
}
