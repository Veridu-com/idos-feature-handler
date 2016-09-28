<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $education = $this->rawBuffer['_education'];
        if (empty($education)) {
            return '';
        }

        if (empty($education[0]['name'])) {
            return '';
        }

        return $education[0]['name'];
    }
}
