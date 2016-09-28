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
        if (! isset($this->rawBuffer['profile'])) {
            return 0;
        }

        $profile = $this->rawBuffer['profile'];
        if (empty($profile['friends']['summary']['total_count'])) {
            if (! isset($this->rawBuffer['friends'])) {
                return 0;
            }

            $friends = $this->rawBuffer['friends'];
            if (empty($friends)) {
                return 0;
            }

            return count($friends);
        }

        return $profile['friends']['summary']['total_count'];
    }
}
