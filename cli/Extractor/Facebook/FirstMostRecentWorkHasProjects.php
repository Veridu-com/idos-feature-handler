<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentWorkHasProjects extends AbstractExtractor {
    public function execute() {
        $work = (array) $this->worker->rawBuffer->waitData('_work');

        if (empty($work)) {
            return;
        }

        if (empty($work[0]['has_projects'])) {
            return;
        }

        return $work[0]['has_projects'];
    }
}
