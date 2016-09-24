<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Top4FriendsCity extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = $this->worker->rawBuffer->waitData('_locationDistribution');
        if (empty($distribution['city'])) {
            return;
        }

        // $cities = array_keys($distribution['city']);
        $cities = get_object_vars($distribution['city']);
        if (empty($cities[3])) {
            return;
        }

        return $cities[3];
    }
}