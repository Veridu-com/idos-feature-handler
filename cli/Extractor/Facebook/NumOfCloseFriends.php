<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfCloseFriends extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $closeFriends = $this->worker->parsedBuffer->waitData('closeFriends');
        if (empty($closeFriends)) {
            return 0;
        }

        $closeFriends = explode(',', $closeFriends);

        return count($closeFriends);
    }
}
