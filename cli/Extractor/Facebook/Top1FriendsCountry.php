<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Top1FriendsCountry extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = $this->worker->rawBuffer['_locationDistribution'];
        if (empty($distribution['country'])) {
            return;
        }

        $countries = array_keys($distribution['country']);
        // $countries = get_object_vars($distribution['country']);
        if (empty($countries[0])) {
            return;
        }

        return $countries[0];
    }
}
