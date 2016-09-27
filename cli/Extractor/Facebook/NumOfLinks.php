<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfLinks extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $links = $this->worker->rawBuffer->getData('links');

        if (empty($links)) {
            return 0;
        }

        return count($links);
    }
}
