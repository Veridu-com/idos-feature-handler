<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FourthMostRecentWorkLocation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['positions'])) {
            return null;
        }

        $work = $this->worker->rawBuffer->waitData('_work');

        if (empty($work[3]) || empty($work[3]['location'])) {
            return null;
        }

        return $work[3]['location'];
    }
}
