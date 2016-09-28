<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfLocations extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['locations'])) {
            return 0;
        }

        $locations = $this->worker->rawBuffer['locations'];
        if (empty($locations)) {
            return 0;
        }

        return count($locations);
    }
}
