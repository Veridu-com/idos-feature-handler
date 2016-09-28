<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class Work extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        //@FIXME check use of _workLocation method
        return [];
        $profile = $this->worker->rawBuffer['profile'];

        if (empty($profile['positions']['values']) && empty($profile['threeCurrentPositions']['values']) && empty($profile['threePastPositions']['values'])) {
            return [];
        }

        $work = [];
        $seen = [];
        if (! empty($profile['positions']['values'])) {
            foreach ($profile['positions']['values'] as $work) {
                if (isset($work['company']['name'], $work['title'], $work['startDate']['year'])) {
                    $work[] = [
                        'employer'   => $work['company']['name'],
                        'position'   => $work['title'],
                        'location'   => (isset($work['company']['id']) ? $this->_workLocation($work['company']['id'], $data) : null),
                        'start_date' => $work['startDate']['year'],
                        'end_date'   => (empty($work['endDate']['year']) ? null : $work['endDate']['year'])
                    ];

                    $seen[] = $work['id'];
                }
            }
        }

        if (! empty($profile['threeCurrentPositions']['values'])) {
            foreach ($profile['threeCurrentPositions']['values'] as $work) {
                if (isset($work['company']['name'], $work['title'], $work['startDate']['year']) && ! in_array($work['id'], $seen)) {
                    $work[] = [
                        'employer'   => $work['company']['name'],
                        'position'   => $work['title'],
                        'location'   => (isset($work['company']['id']) ? $this->_workLocation($work['company']['id'], $data) : null),
                        'start_date' => $work['startDate']['year'],
                        'end_date'   => (empty($work['endDate']['year']) ? null : $work['endDate']['year'])
                    ];

                    $seen[] = $work['id'];
                }
            }
        }

        if (! empty($profile['threePastPositions']['values'])) {
            foreach ($profile['threePastPositions']['values'] as $work) {
                if (isset($work['company']['name'], $work['title'], $work['startDate']['year']) && ! in_array($work['id'], $seen)) {
                    $work[] = [
                        'employer'   => $work['company']['name'],
                        'position'   => $work['title'],
                        'location'   => (isset($work['company']['id']) ? $this->_workLocation($work['company']['id'], $data) : null),
                        'start_date' => $work['startDate']['year'],
                        'end_date'   => (empty($work['endDate']['year']) ? null : $work['endDate']['year'])
                    ];

                    $seen[] = $work['id'];
                }
            }
        }

        if (count($work)) {
            usort(
                $work, function ($a, $b) {
                    if (empty($a['end_date']) && empty($b['end_date'])) {
                        return $b['start_date'] - $a['start_date'];
                    }

                    if (empty($a['end_date'])) {
                        return -1;
                    }

                    if (empty($b['end_date'])) {
                        return 1;
                    }

                    if ($a['start_date'] == $b['start_date']) {
                        return $b['end_date'] - $a['end_date'];
                    }

                    return $b['start_date'] - $a['start_date'];
                }
            );
        }

        return $work;
    }
}
