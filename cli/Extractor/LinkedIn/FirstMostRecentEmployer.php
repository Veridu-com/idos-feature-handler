<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentEmployer extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['positions'])) {
            return;
        }

        $work = $this->worker->rawBuffer->waitData('_work');

        if (empty($work[0]) || empty($work[0]['employer'])) {
            return;
        }

        return $work[0]['employer'];
    }
}
