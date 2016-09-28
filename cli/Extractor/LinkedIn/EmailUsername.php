<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class EmailUsername extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $emailAddress = $this->parsedBuffer['emailAddress'];

        if ($emailAddress === null) {
            return;
        }

        $emailAddress = explode('@', $emailAddress);

        return $emailAddress[0];
    }
}
