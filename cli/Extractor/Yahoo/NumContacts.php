<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class NumContacts extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $contacts = $this->worker->rawBuffer->getData('contacts');

        if (empty($contacts)) {
            return 0;
        }

        return count($contacts);
    }
}
