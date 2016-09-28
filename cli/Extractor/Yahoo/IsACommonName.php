<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class IsACommonName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstName = $this->parsedBuffer->waitData('firstName');

        if (empty($firstName)) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->isCommonName($firstName);
        return;
    }
}
