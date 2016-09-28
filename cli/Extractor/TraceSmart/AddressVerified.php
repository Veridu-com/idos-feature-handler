<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class AddressVerified extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $address = $this->worker->rawBuffer->getData('address');

        if (empty($address)) {
            return false;
        }

        return in_array(
            $address['Address']['MatchType'],
            ['Full', 'Partial', 'Multiple']
        );
    }
}