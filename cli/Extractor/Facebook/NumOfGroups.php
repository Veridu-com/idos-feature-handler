<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfGroups extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['groups'])) {
            return 0;
        }

        $groups = $this->rawBuffer['groups'];
        if (empty($groups)) {
            return 0;
        }

        return count($groups);
    }
}
