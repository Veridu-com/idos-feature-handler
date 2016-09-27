<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class AvgPostsPerWeek extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $likes = [];
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property) {
            $data = $this->worker->rawBuffer->getData($property);
            if (! empty($data)) {
                foreach ($data as $item) {
                    if (empty($item['created_time'])) {
                        $ts = strtotime($item['updated_time']);
                    } else {
                        $ts = strtotime($item['created_time']);
                    }

                    if ($ts === false) {
                        continue;
                    }

                    if (! isset($posts[date('Y', $ts)])) {
                        $posts[date('Y', $ts)] = [];
                    }

                    if (! isset($posts[date('Y', $ts)][date('n', $ts)])) {
                        $posts[date('Y', $ts)][date('n', $ts)] = 0;
                    }

                    $posts[date('Y', $ts)][date('n', $ts)]++;
                }
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];

        foreach ($likes as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month'])) {
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

        ksort($likes);

        return $likes;
    }
}
