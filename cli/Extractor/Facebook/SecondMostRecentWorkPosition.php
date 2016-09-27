<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class SecondMostRecentWorkPosition extends AbstractExtractor {
    public function execute() {
        $work = (array) $this->worker->rawBuffer->waitData('_work');

        if (empty($work)) {
            return;
        }

        if (empty($work[1]['position'])) {
            return;
        }

        return empty($work[1]['position']);
    }
}
