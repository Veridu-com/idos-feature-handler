<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class SecondEmailUsername extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $secondEmailAddress = $this->worker->parsedBuffer->waitData('secondEmailAddress');

        if ($secondEmailAddress === null) {
            return;
        }

        $secondEmailAddress = explode('@', $secondEmailAddress);

        return $secondEmailAddress[0];
    }
}
