<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsWithinThreeYears extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $birthDate = $this->worker->rawBuffer['_fullBirthDate'];
        if (empty($birthDate)) {
            return 0;
        }

        $distribution = $this->worker->rawBuffer['_ageDistribution'];
        if (empty($distribution)) {
            return 0;
        }

        $count = 0;
        foreach ($distribution as $year => $number) {
            if (abs($birthDate['year'] - $year) <= 3) {
                $count += $number;
            }
        }

        return $count;
    }
}
