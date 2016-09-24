<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class Top5ConnectionsCity extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = $this->worker->rawBuffer->waitData('_locationDistribution');

        if (empty($distribution['city'])) {
            return;
        }

        $countries = array_keys($distribution['city']);

        return $countries[0];
    }
}