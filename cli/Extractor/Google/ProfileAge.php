<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class ProfileAge extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $activities = $this->worker->rawBuffer->getData('activities');

        if (empty($activities)) {
            return null;
        }

        $age = null;
        foreach ($activities as $activity) {
            if (empty($activity['published'])) {
                $ts = strtotime($activity['updated']);
            } else {
                $ts = strtotime($activity['published']);
            }

            if ($ts === false) {
                continue;
            }

            if ($age === null || ($ts < $age)) {
                $age = $ts;
            }
        }

        return $age;
    }
}
