<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class IsProfilePremium extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->parsedBuffer->getData('profile');

        return $profile['product'] === 'premium' ? true : false;
    }
}
