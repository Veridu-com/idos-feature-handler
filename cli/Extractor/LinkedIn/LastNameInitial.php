<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class LastNameInitial extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $fullName = $this->parsedBuffer['fullName'];

        if (empty($fullName)) {
            return;
        }

        return $this->worker->nameParser->lastNameInitial($fullName);
    }
}
