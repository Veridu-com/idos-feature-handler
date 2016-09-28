<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class MostActiveCountryPastYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $activity = [];
        $now      = time();
        $limit    = (12 * 2629743);

        foreach (['locations', 'links', 'photos', 'posts', 'statuses', 'tagged'] as $property) {
            if (! isset($this->worker->rawBuffer[$property])) {
                continue;
            }

            $data = $this->worker->rawBuffer[$property];
            if (empty($data)) {
                continue;
            }

            foreach ($data as $item) {
                if (empty($item['created_time']) || empty($item['place']['location']['country'])) {
                    continue;
                }

                $timestamp = strtotime($item['created_time']);
                if (empty($timestamp)) {
                    continue;
                }

                if (($now - $timestamp) > $limit) {
                    break;
                }

                if (! isset($activity[$item['place']['location']['country']])) {
                    $activity[$item['place']['location']['country']] = 0;
                }

                $activity[$item['place']['location']['country']]++;
            }
        }

        if (empty($activity)) {
            return '';
        }

        arsort($activity);
        $activity = array_keys($activity);

        return $activity[0];
    }
}