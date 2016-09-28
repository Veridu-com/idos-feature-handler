<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class IsSanctionedName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $fullName = $this->worker->parsedBuffer['fullName'];
        if (empty($fullName)) {
            return false;
        }

        // FIXME
        //return Utils::getInstance()->isSanctionedName($fullName);
        return false;
    }
}