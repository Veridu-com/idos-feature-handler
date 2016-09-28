<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class BirthDay extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['profile'])) {
            return 0;
        }

        $profile = $this->worker->rawBuffer['profile'];
        if (empty($profile['birthday'])) {
            return 0;
        }

        if (strpos($profile['birthday'], '/') === false) {
            return 0;
        }

        $date = explode('/', $profile['birthday']);
        if (isset($date[1]))
            return intval($date[1]);

        return 0;
    }
}
