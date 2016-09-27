<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class AvgFriendsBirthYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = (array) $this->worker->rawBuffer->waitData('_ageDistribution');

        if (empty($distribution)) {
            return 0;
        }

        $years = array_keys($distribution);
        
        return $years[0];
    }
}
