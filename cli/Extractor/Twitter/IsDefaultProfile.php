<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Twitter;

use Cli\Extractor\AbstractExtractor;

class IsDefaultProfile extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');

        if (empty($profile['default_profile'])) {
            return false;
        }

        return $profile['default_profile'];
    }
}
