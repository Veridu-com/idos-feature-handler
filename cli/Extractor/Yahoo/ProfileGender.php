<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class ProfileGender extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['gender'])) {
            return;
        }

        switch (strtolower($profile['gender'])) {
            case 'm':
                return 'male';
            case 'f':
                return 'female';
            default:
                return 'other';
        }
    }
}