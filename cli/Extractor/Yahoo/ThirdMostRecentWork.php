<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class ThirdMostRecentWork extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $work = $this->worker->rawBuffer->waitData('_work');

        if (empty($work[2]['name'])) {
            return null;
        }

        return $work[2]['name'];
    }
}
