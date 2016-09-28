<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class BirthYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['profile'])) {
            return 0;
        }

        $profile = $this->rawBuffer['profile'];
        if (empty($profile['birthday'])) {
            return 0;
        }

        if (strpos($profile['birthday'], '/') === false) {
            return 0;
        }

        $date = explode('/', $profile['birthday']);
        if (isset($date[2]))
            return intval($date[2]);

        return 0;
    }
}
