<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class ThirdMostRecentWorkLocation extends AbstractExtractor {
    public function execute() {
        $work = $this->worker->rawBuffer->waitData('_work');

        if (empty($work)) {
            return;
        }

        if (empty($work[2]['location'])) {
            return;
        }

        return empty($work[2]['location']);
    }
}
