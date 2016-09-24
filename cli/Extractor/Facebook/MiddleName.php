<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class MiddleName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $fullName = $this->worker->parsedBuffer->waitData('fullName');
        if (empty($fullName)) {
            return;
        }

        return $this->worker->nameParser->middleName($fullName);
    }
}
