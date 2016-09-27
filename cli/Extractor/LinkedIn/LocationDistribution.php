<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class LocationDistribution extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        //$connections = $this->worker->rawBuffer->waitData('_connections');

        $location = [
            'city'    => [],
            'region'  => [],
            'country' => []
        ];

        return $location;

        if (empty($connections)) {
            return $location;
        }

        //@FIXME correct the usage of Utils class
        $utils = Utils::getInstance();
        foreach ($connections as $connection) {
            if (! empty($connection['location']['name'])) {
                if (strpos($connection['location']['name'], ',') === false) {
                    $city = trim(str_replace('Area', '', $connection['location']['name']));
                }
                else {
                    $name = explode(',', $connection['location']['name']);
                    $city = trim(str_replace('Area', '', $name[0]));
                }

                if (! empty($city)) {
                    if (! isset($location['city'][$city])) {
                        $location['city'][$city] = 0;
                    }

                    $location['city'][$city]++;
                }
            }

            if (! empty($connection['location']['country']['code'])) {
                //@FIXME check for method 'codeToCountry' in Utils
                //$country = $utils->codeToCountry($connection['location']['country']['code']);
                $country = [];

                if (! empty($country)) {
                    if (! isset($location['country'][$country])) {
                        $location['country'][$country] = 0;
                    }

                    $location['country'][$country]++;
                }
            }
        }

        arsort($location['city']);
        arsort($location['country']);

        return $location;
    }
}
