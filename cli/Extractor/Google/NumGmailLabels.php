<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class NumGmailLabels extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $labels = $this->rawBuffer->getData('labels');

        if (empty($labels)) {
            return 0;
        }

        return count($labels);
    }
}
