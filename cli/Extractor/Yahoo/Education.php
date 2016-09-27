<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class Education extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['schools'])) {
            return [];
        }

        $education = [];
        foreach ($profile['schools'] as $school) {
            if (isset($school['schoolName'], $school['schoolType'], $school['startDate'], $school['endDate'])) {
                $education[] = [
                    'name' => $school['schoolName'],
                    'type' => $school['schoolType'],
                    'city' => isset($school['city']) ? $school['city'] : null,
                    'state' => isset($school['state']) ? $school['state'] : null,
                    'country' => isset($school['country']) ? $school['country'] : null,
                    'start_date' => $school['startDate'],
                    'end_date' => $school['endDate']
                ];
            }
        }

        if (count($education)) {
            usort($education, function ($a, $b) {
                if ($b['start_date'] == $a['start_date']) {
                    return ($b['end_date'] - $a['end_date']);
                }
                
                return ($b['start_date'] - $a['start_date']);
            });
        }

        return $education;
    }
}
