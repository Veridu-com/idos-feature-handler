<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumEvents extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $events = $this->worker->rawBuffer->getData('events');

        if (empty($events)) {
            return 0;
        }

        return count($events);
    }
}
