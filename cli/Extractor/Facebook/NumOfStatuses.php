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
        $statuses = $this->worker->rawBuffer->getData('statuses');

        if (empty($statuses)) {
            return 0;
        }
        
        return count($statuses);
    }
}
