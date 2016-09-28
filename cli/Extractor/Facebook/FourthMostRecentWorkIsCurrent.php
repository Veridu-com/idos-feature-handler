<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FourthMostRecentWorkIsCurrent extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $work = (array) $this->worker->rawBuffer['_work'];
        if (empty($work)) {
            return '';
        }

        if (empty($work[3])) {
            return '';
        }

        return empty($work[3]['end_date']);
    }
}
