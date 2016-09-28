<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Education extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['profile'])) {
            return [];
        }

        $profile = $this->rawBuffer['profile'];
        if (empty($profile['education'])) {
            return [];
        }

        $return = [];

        foreach ($profile['education'] as $education) {
            if (isset($education['school']['id'], $education['school']['name'], $education['year']['name'])) {
                $return[] = [
                    'id'     => $education['school']['id'],
                    'name'   => $education['school']['name'],
                    'year'   => $education['year']['name'],
                    'type'   => (isset($education['type']) ? $education['type'] : null),
                    'course' => (isset($education['concentration'][0]['name']) ? $education['concentration'][0]['name'] : null)
                ];
            }
        }

        if (count($return)) {
            usort(
                $return,
                function ($a, $b) {
                    return $b['year'] - $a['year'];
                }
            );
        }

        return $return;
    }
}
