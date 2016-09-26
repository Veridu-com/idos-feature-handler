<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class CityName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['location']['name'])) {
            return;
        }

        if (strpos($profile['location']['name'], ',') === false) {
            return trim(str_replace('Area', '', $profile['location']['name']));
        }

        $city = explode(',', $profile['location']['name']);
        return trim(str_replace('Area', '', $city[0]));
    }
}
