<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Dropbox;

use Cli\Extractor\AbstractExtractor;

class NumDirectories extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $dirs = $this->rawBuffer->getData('_dirs');

        if (empty($dirs)) {
            return 0;
        }

        return count($dirs);
    }
}
