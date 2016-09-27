<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class StreetAddress extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $street = $this->worker->rawBuffer->getData('street');
        $street1 = $this->worker->rawBuffer->getData('street1');
        $number = $this->worker->rawBuffer->getData('number');

        if (empty($street)) {
            if (empty($street1)) {
                return;
            }

            return $street1;
        }
        
        if (empty($number)) {
            return $street;
        }

        return "$number $street";
    }
}
