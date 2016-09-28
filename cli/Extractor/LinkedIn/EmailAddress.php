<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class EmailAddress extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer['profile'];

        if (empty($profile['emailAddress']) || strpos($profile['emailAddress'], '@') === false) {
            return;
        }

        return $profile['emailAddress'];
    }
}
