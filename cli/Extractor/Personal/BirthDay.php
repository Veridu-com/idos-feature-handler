<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class BirthDay extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $birthday = $this->worker->rawBuffer->getData('birthday');

        if (empty($birthday)) {
            return 0;
        }

        return intval($birthday);
    }
}
