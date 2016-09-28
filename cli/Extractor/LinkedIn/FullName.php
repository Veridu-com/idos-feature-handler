<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FullName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer['profile'];

        if (empty($profile['firstName']) || empty($profile['lastName'])) {
            return;
        }

        return sprintf('%s %s', trim($profile['firstName']), trim($profile['lastName']));
    }
}
