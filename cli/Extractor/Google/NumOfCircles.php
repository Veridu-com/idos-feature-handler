<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class NumOfCircles extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $circles = $this->worker->rawBuffer->getData('circles');

        if (empty($circles)) {
            return 0;
        }

        return count($circles);
    }
}
