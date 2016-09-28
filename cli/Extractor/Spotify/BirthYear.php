<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class BirthYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');

        if (empty($profile['birthdate'])) {
            return 0;
        }

        if (strpos($profile['birthdate'], '-') === false) {
            return 0;
        }

        $date = explode('-', $profile['birthdate']);
        if (isset($date[0])) {
            return intval($date[0]);
        }

        return 0;
    }
}
