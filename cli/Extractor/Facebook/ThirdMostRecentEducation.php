<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class ThirdMostRecentEducation extends AbstractExtractor {
    public function execute() {
        $education = $this->worker->rawBuffer->waitData('_education');

        if (empty($education)) {
            return;
        }

        if (empty($education[2]['name'])) {
            return;
        }

        return $education[2]['name'];
    }
}
