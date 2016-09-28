<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class Top3ConnectionsCountry extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = (array) $this->rawBuffer['_locationDistribution'];

        if (empty($distribution['country'])) {
            return;
        }

        $countries = array_keys((array) $distribution['country']);
        if (empty($countries[2])) {
            return;
        }

        return $countries[2];
    }
}
