<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class CurrentRegionName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $cityName = $this->worker->parsedBuffer->waitData('cityName');

        if (empty($cityName)) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->regionFromCity($cityName);
        return;
    }
}
