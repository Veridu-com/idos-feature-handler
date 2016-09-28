<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FourthMostRecentEmployer extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $work = (array) $this->rawBuffer['_work'];
        if (empty($work)) {
            return '';
        }

        if (empty($work[3]['employer'])) {
            return '';
        }

        return $work[3]['employer'];
    }
}
