<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Top4FriendsCountry extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = $this->worker->rawBuffer->waitData('_locationDistribution');

        if (empty($distribution['country'])) {
            return null;
        }

        $countries = array_keys($distribution['country']);

        if (empty($countries[3])) {
            return null;
        }

        return $countries[3];
    }
}
