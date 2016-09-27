<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class EmailUsername extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $email = $this->worker->parsedBuffer->waitData('emailAddress');

        if ($email === null) {
            return;
        }

        $email = explode('@', $email);

        return $email[0];
    }
}
