<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class CurrentCountryName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $cityName = $this->worker->parsedBuffer->waitData('currentCityName');

        if (empty($cityName)) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->countryFromCity($cityName);
        return;
    }
}