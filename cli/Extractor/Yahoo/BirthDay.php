<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class BirthDay extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['birthdate'])) {
            return 0;
        }

        if (strpos($profile['birthdate'], '/') === false) {
            return 0;
        }

        $date = explode('/', $profile['birthdate']);
        if (isset($date[1])) {
            return intval($date[1]);
        }
        
        return 0;
    }
}
