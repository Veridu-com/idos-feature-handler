<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class ThirdEmailUsername extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $thirdEmailAddress = $this->worker->parsedBuffer->waitData('thirdEmailAddress');

        if ($thirdEmailAddress === null) {
            return;
        }

        $thirdEmailAddress = explode('@', $thirdEmailAddress);
        return $thirdEmailAddress[0];
    }
}
