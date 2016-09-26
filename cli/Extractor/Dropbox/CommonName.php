<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class CommonName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstName = $this->worker->parsedBuffer->waitData('firstName');

        if (empty($firstName)) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->isCommonName($firstName);
        return;
    }
}
