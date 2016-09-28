<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class ProfilePicture extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');
        $plus    = $this->rawBuffer->getData('plus');

        if (empty($profile['picture'])) {
            if (empty($plus['image']['url'])) {
                return;
            }

            return $plus['image']['url'];
        }

        return $profile['picture'];
    }
}
