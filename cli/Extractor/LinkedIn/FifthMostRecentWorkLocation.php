<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FifthMostRecentWorkLocation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['positions'])) {
            return;
        }

        $work = $this->worker->rawBuffer->waitData('_work');

        if (empty($work[4]) || empty($work[4]['location'])) {
            return;
        }

        return $work[4]['location'];
    }
}
