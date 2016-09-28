<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class SecondMostRecentEducationType extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $education = $this->worker->rawBuffer['_education'];
        if (empty($education)) {
            return '';
        }

        if (empty($education[1]['type'])) {
            return '';
        }

        return $education[1]['type'];
    }
}
