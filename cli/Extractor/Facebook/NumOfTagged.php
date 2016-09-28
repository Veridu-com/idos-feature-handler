<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfTagged extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['tagged'])) {
            return 0;
        }

        $tagged = $this->worker->rawBuffer['tagged'];
        if (empty($tagged)) {
            return 0;
        }

        return count($tagged);
    }
}
