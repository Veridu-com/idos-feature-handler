<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class Education extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['educations']['values'])) {
            return [];
        }

        $education = [];
        foreach ($profile['educations']['values'] as $education) {
            if (isset($education['schoolName'], $education['startDate']['year'], $education['endDate']['year'])) {
                if (isset($education['degree'])) {
                    switch (strtolower($education['degree'])) {
                        case 'high school':
                            $type = 'High School';
                            break;

                        case 'associate\'s degree':
                        case 'bachelor\'s degree':
                        case 'master\'s degree':
                        case 'master of business administration (m.b.a.)':
                        case 'juris doctor (j.d.)':
                        case 'doctor of medicine (m.d.)':
                        case 'doctor of philosophy (ph.d.)':
                        case 'engineer\'s degree':
                            $type = 'College';
                            break;

                        default:
                            $type = 'Other';
                    }
                } else {
                    $type = null;
                }

                $education[] = [
                    'name' => $education['schoolName'],
                    'start_year' => $education['startDate']['year'],
                    'end_year' => $education['endDate']['year'],
                    'type' => $type,
                    'course' => isset($education['fieldOfStudy']) ? $education['fieldOfStudy'] : null
                ];
            }
        }

        if (count($education)) {
            usort(
                $education, function ($a, $b) {
                    if ($b['start_year'] == $a['start_year']) {
                        return ($b['end_year'] - $a['end_year']);
                    }
                
                    return ($b['start_year'] - $a['start_year']);
                }
            );
        }

        return $education;
    }
}
