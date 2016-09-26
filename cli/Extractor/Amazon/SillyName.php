<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Amazon;

use Cli\Extractor\AbstractExtractor;

class SillyName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstName = $this->worker->parsedBuffer->waitData('firstName');

        if ($firstName === null) {
            return false;
        }

        //@FIXME
        //return Utils::getInstance()->isCommonName($name);
        return;
    }
}
