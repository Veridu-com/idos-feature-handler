<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Work extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['work'])) {
            return [];
        }

        $return = [];

        foreach ($profile['work'] as $work) {
            if (isset($work['employer']['name'], $work['position']['name'], $work['start_date'])) {
                $return[] = [
                    'employer'     => $work['employer']['name'],
                    'position'     => $work['position']['name'],
                    'location'     => (empty($work['location']['name']) ? null : $work['location']['name']),
                    'has_projects' => ! empty($work['projects']),
                    'start_date'   => $work['start_date'],
                    'end_date'     => (empty($work['end_date']) ? null : $work['end_date'])
                ];
            }
        }

        if (count($return)) {
            usort(
                $return,
                function ($a, $b) {
                    if ((empty($a['end_date'])) && (empty($b['end_date']))) {
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

        return $return;
    }
}
