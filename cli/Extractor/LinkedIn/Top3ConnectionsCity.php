<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class Top3ConnectionsCity extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = (array) $this->rawBuffer['_locationDistribution'];

        if (empty($distribution['city'])) {
            return;
        }

        $cities = array_keys((array) $distribution['city']);
        if (empty($cities[2])) {
            return;
        }

        return $cities[2];
    }
}
