<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class Work extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['works'])) {
            return [];
        }

        $_work = [];
        foreach ($profile['works'] as $work) {
            if (isset($work['workName'], $work['title'], $work['startDate'], $work['endDate'])) {
                $_work[] = [
                    'employer'    => $work['workName'],
                    'position'    => $work['title'],
                    'address'     => isset($work['address']) ? $work['address'] : null,
                    'postal_code' => isset($work['postalCode']) ? $work['postalCode'] : null,
                    'city'        => isset($work['city']) ? $work['city'] : null,
                    'state'       => isset($work['state']) ? $work['state'] : null,
                    'country'     => isset($work['country']) ? $work['country'] : null,
                    'start_date'  => $work['startDate'],
                    'end_date'    => $work['endDate']
                ];
            }
        }

        if (count($_work)) {
            usort(
                $_work, function ($a, $b) {
                    if ($b['start_date'] == $a['start_date']) {
                        return $b['end_date'] - $a['end_date'];
                    }

                    return $b['start_date'] - $a['start_date'];
                }
            );
        }

        return $_work;
    }
}
