<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class IsWithinStudentAge extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $birthDate = $this->rawBuffer['_fullBirthDate'];
        if ((empty($birthDate)) || (empty($birthDate['year']))) {
            return '';
        }

        $age = date('Y') - $birthDate['year'];

        //from 10 to 18 for mid/high school
        //from 18 to 25 for college
        return $age >= 10 && $age <= 25;
    }
}
