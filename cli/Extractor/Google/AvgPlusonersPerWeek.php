<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class AvgPlusonersPerWeek extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $activities = $this->worker->rawBuffer->getData('activities');

        if (empty($activities)) {
            return;
        }

        $plusoners = [];
        foreach ($activities as $activity) {
            if (empty($activity['published'])) {
                $ts = strtotime($activity['updated']);
            } else {
                $ts = strtotime($activity['published']);
            }

            if ($ts === false) {
                continue;
            }

            if (! isset($plusoners[date('Y', $ts)])) {
                $plusoners[date('Y', $ts)] = [];
            }

            if (! isset($plusoners[date('Y', $ts)][date('n', $ts)])) {
                $plusoners[date('Y', $ts)][date('n', $ts)] = 0;
            }

            $plusoners[date('Y', $ts)][date('n', $ts)] += $activity['object']['plusoners']['totalItems'];
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];

        foreach ($plusoners as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if ($year == $current['year'] && $i > $current['month']) {
                    break;
                }

                if (isset($months[$i])) {
                    $months[$i] = round($months[$i] / 4, 2);
                } else {
                    $months[$i] = 0;
                }
            }

            ksort($months);
        }

        ksort($plusoners);

        return $plusoners;
    }
}