<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class IsCommonName extends AbstractExtractor {
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
