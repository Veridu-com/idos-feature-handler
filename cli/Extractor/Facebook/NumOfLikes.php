<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfLikes extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['likes'])) {
            return 0;
        }

        $likes = $this->worker->rawBuffer['likes'];
        if (empty($likes)) {
            return 0;
        }

        return count($likes);
    }
}
