<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFamilyMembers extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $family = $this->worker->rawBuffer->getData('family');
        if (empty($family)) {
            return 0;
        }

        return count($family);
    }
}
