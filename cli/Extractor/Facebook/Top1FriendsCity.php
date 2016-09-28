<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Top1FriendsCity extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = (array) $this->worker->rawBuffer['_locationDistribution'];
        if (empty($distribution['city'])) {
            return '';
        }

        $cities = array_keys((array) $distribution['city']);
        if (empty($cities[0])) {
            return '';
        }

        return $cities[0];
    }
}
