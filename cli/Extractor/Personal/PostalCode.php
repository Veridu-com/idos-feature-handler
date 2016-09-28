<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class PostalCode extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $postalcode = $this->rawBuffer->waitData('postalcode');

        if (empty($postalcode)) {
            return;
        }

        return preg_replace('/[^0-9A-Za-z]+/', '', $postalcode);
    }
}
