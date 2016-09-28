<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class IsListedName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $fullName = $this->parsedBuffer['fullName'];
        if (empty($fullName)) {
            return false;
        }

        // FIXME
        //return Utils::getInstance()->isListedName($fullName);
        return false;
    }
}
