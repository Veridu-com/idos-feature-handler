<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class CurrentRegionName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $city = $this->worker->parsedBuffer->waitData('currentCityName');

        if ($city === null) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->regionFromCity()
        return;
    }
}
