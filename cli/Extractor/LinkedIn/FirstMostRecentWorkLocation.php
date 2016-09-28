<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentWorkLocation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer['profile'];

        if (empty($profile['positions'])) {
            return;
        }

        $work = (array) $this->worker->rawBuffer['_work'];

        if (empty($work[0]) || empty($work[0]['location'])) {
            return;
        }

        return $work[0]['location'];
    }
}
