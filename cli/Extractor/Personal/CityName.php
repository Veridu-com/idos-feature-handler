<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class CityName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $city = $this->worker->rawBuffer->getData('city');

        if (empty($city)) {
            return;
        }

        return intval($city);
    }
}
