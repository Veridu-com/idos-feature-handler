<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class BirthMonth extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $birthmonth = $this->worker->rawBuffer->getData('birthmonth');

        if (empty($birthmonth)) {
            return 0;
        }

        return intval($birthmonth);
    }
}
