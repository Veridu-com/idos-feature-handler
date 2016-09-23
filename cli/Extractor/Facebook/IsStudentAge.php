<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class IsStudentAge extends AbstractExtractor {
    public function execute() {
        $birthDate = $this->worker->rawBuffer->waitData('_fullBirthDate');

        if ($birthDate === null) {
            return;
        }

        if ($birthDate['year'] === null) {
            return;
        }

        $age = date('Y') . $birthDate['year'];

        return $age >= 10 && $age <= 25;
    }
}
