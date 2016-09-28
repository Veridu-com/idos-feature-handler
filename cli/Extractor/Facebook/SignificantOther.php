<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class SignificantOther extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['profile'])) {
            return;
        }

        $profile = $this->worker->rawBuffer['profile'];
        if (empty($profile['significant_other']['name'])) {
            return;
        }

        return $profile['significant_other']['name'];
    }
}
