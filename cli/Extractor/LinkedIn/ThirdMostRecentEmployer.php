<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class ThirdMostRecentEmployer extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['positions'])) {
            return null;
        }

        $work = $this->worker->rawBuffer->waitData('_work');

        if (empty($work[2]) || empty($work[2]['employer'])) {
            return null;
        }

        return $work[2]['employer'];
    }
}
