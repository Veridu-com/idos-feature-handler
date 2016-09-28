<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class NameGender extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstName = $this->parsedBuffer->waitData('firstName');

        if ($firstName === null) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->nameGender($firstName)
        return;
    }
}
