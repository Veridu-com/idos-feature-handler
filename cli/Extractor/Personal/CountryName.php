<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class CountryName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $country = $this->rawBuffer->getData('country');

        if (empty($country)) {
            return;
        }

        return intval($country);
    }
}
