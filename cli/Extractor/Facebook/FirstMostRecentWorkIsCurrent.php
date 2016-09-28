<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentWorkIsCurrent extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $work = (array) $this->worker->rawBuffer['_work'];
        if (empty($work)) {
            return '';
        }

        if (empty($work[0])) {
            return '';
        }

        return empty($work[0]['end_date']);
    }
}
