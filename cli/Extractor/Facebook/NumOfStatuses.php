<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfStatuses extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['statuses'])) {
            return 0;
        }

        $statuses = $this->rawBuffer['statuses'];
        if (empty($statuses)) {
            return 0;
        }

        return count($statuses);
    }
}
