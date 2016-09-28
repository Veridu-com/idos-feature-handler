<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FifthMostRecentEmployer extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer['profile'];

        if (empty($profile['positions'])) {
            return;
        }

        $work = (array) $this->rawBuffer['_work'];

        if (empty($work[4]) || empty($work[4]['employer'])) {
            return;
        }

        return $work[4]['employer'];
    }
}
