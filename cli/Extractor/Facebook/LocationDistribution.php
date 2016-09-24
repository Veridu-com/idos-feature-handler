<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class LocationDistribution extends AbstractExtractor {
    const SUPPORT_DATA = true;

    public function execute() {
        $location = [
            'city'    => [],
            'country' => []
        ];

        //@FIXME
        //$friends = $this->worker->rawBuffer->waitData('_friends');
        $friends = [];

        if (empty($friends)) {
            return $location;
        }

        foreach ($friends as $friend) {
            if (empty($friend['location']['name'])) {
                continue;
            }

            if (strpos($friend['location']['name'], ',') === false) {
                $city    = $friend['location']['name'];
                $country = null;
            } else {
                $name    = explode(',', $friend['location']['name']);
                $city    = trim($name[0]);
                $country = trim(array_pop($name));
            }

            if (! empty($city)) {
                if (! isset($location['city'][$city])) {
                    $location['city'][$city] = 0;
                }

                $location['city'][$city]++;
            }

            if (! empty($country)) {
                if (! isset($location['country'][$country])) {
                    $location['country'][$country] = 0;
                }

                $location['country'][$country]++;
            }
        }

        arsort($location['city']);
        arsort($location['country']);

        return $location;
    }
}
