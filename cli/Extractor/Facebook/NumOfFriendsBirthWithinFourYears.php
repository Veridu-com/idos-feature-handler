<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsBirthWithinFourYears extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $birthYear = $this->worker->parsedBuffer->waitData('birthYear');

        if (empty($birthYear)) {
            return 0;
        }

        $distribution = $this->worker->rawBuffer->waitData('_ageDistribution');

        if (empty($distribution)) {
            return 0;
        }

        $count = 0;
        foreach ($distribution as $year => $number) {
            if (abs($birthYear - $year) <= 4) {
                $count += $number;
            }
        }

        return $count;
    }
}
