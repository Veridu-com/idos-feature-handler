<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Twitter;

use Cli\Extractor\AbstractExtractor;

class IsGeoEnabled extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');

        if (empty($profile['geo_enabled'])) {
            return false;
        }

        return $profile['geo_enabled'];
    }
}
