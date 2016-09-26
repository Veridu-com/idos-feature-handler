<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class FirstEmailUsername extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstEmailAddress = $this->worker->parsedBuffer->waitData('firstEmailAddress');

        if ($firstEmailAddress === null) {
            return;
        }

        $firstEmailAddress = explode('@', $firstEmailAddress);
        return $firstEmailAddress[0];
    }
}
