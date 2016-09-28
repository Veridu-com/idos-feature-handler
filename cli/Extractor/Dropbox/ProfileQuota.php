<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Dropbox;

use Cli\Extractor\AbstractExtractor;

class ProfileQuota extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');

        if(! isset($profile['quota_info']['quota'])) {
            return -1;
        }

        return $profile['quota_info']['quota'];
    }
}
