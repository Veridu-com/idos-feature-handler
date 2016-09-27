<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class CurrentCityName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $plus = $this->worker->rawBuffer->getData('plus');

        if (empty($plus['placesLived'])) {
            return;
        }

        $i = 0;
        do {
            $i++;
        } while (isset($plus['placesLived'][$i]) && empty($plus['placesLived'][$i]['primary']));

        if (empty($plus['placesLived'][$i]['value'])) {
            $i = 0;
        }

        if (strpos($plus['placesLived'][$i]['value'], ',') === false) {
            if (strpos($plus['placesLived'][$i]['value'], '-') === false) {
                return $plus['placesLived'][$i]['value'];
            }

            $city = explode('-', $plus['placesLived'][$i]['value']);

            return trim($city[0]);
        }

        $city = explode(',', $plus['placesLived'][$i]['value']);

        return trim($city[0]);
    }
}
