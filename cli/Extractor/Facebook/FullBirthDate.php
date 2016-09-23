<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FullBirthDate extends AbstractExtractor {
    const SUPPORT_DATA = true;

    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['birthday'])) {
            return;
        }

        if (strpos($profile['birthday'], '/') === false) {
            return;
        }

        $date = explode('/', $profile['birthday']);

        return [
            'year'  => isset($date[2]) ? (int) $date[2] : null,
            'month' => isset($date[1]) ? (int) $date[1] : null,
            'day'   => isset($date[0]) ? (int) $date[0] : null
        ];
    }
}
