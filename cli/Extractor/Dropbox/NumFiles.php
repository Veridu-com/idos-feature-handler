<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class NumFiles extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $files = $this->worker->rawBuffer->getData('_files');

        if (empty($files)) {
            return 0;
        }

        return count($files);
    }
}
