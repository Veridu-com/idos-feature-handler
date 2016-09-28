<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class CityName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $homeAddress = $this->worker->rawBuffer->waitData('_homeAddress');

        if (empty($homeAddress) || empty($homeAddress['city'])) {
            return;
        }

        return $homeAddress['city'];
    }
}