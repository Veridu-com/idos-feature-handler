<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NameGender extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstName = $this->worker->parsedBuffer['firstName'];
        if (empty($firstName)) {
            return '';
        }

        // FIXME
        //return Utils::getInstance()->nameGender();
        return '';
    }
}
