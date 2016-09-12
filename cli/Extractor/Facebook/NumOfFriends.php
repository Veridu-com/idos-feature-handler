<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriends extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        if (empty($profile['friends']['summary']['total_count'])) {
            $friends = $this->worker->rawBuffer->getData('friends');
            if (empty($friends)) {
                return 0;
            }

            return count($friends);
        }

        return $profile['friends']['summary']['total_count'];
    }
}
