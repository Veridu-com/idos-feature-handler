<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Twitter;

use Cli\Extractor\AbstractExtractor;

class AvgRetweetedPerWeek extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $statuses = $this->rawBuffer->getData('statuses');

        if (empty($statuses)) {
            return;
        }

        $return = [];
        foreach ($statuses as $status) {
            $ts = strtotime($status['created_at']);

            if ($ts === false) {
                continue;
            }

            if (! $status['favorited'] && ! $status['retweeted'] && ! empty($status['retweet_count'])) {
                if (! isset($return[date('Y', $ts)])) {
                    $return[date('Y', $ts)] = [];
                }

                if (! isset($return[date('Y', $ts)][date('n', $ts)])) {
                    $return[date('Y', $ts)][date('n', $ts)] = 0;
                }

                $return[date('Y', $ts)][date('n', $ts)] += $status['retweet_count'];
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];

        foreach ($return as $year => &$months) {
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

        ksort($return);

        return $return;
    }
}
