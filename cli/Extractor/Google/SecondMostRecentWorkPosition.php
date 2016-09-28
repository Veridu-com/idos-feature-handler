<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class SecondMostRecentWorkPosition extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $plus = $this->rawBuffer->getData('plus');

        if (empty($plus['organizations'])) {
            return;
        }

        //@FIXME
        //$work = $this->rawBuffer->waitData('_work');
        $work = [];

        if (empty($work) || empty($work[1]) || empty($work[1]['position'])) {
            return;
        }

        return $work[1]['position'];
    }
}
