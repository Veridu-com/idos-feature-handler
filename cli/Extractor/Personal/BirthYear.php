<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class BirthYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $birthyear = $this->worker->rawBuffer->getData('birthyear');

        if (empty($birthyear)) {
            return 0;
        }

        return intval($birthyear);
    }
}
