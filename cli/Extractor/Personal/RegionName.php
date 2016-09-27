<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class RegionName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $state = $this->worker->rawBuffer->getData('state');

        if (empty($state)) {
            return;
        }

        return $state;
    }
}
