<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class ElectoralRoll extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $address = $this->rawBuffer->getData('address');

        if (empty($address)) {
            return false;
        }

        return preg_match('/ER20[0-9]2/', $address['Address']['Source']);
    }
}
