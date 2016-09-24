<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class SecondMostRecentWorkIsCurrent extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $plus = $this->worker->rawBuffer->getData('plus');

        if (empty($plus['organizations'])) {
            return;
        }

        //@FIXME
        //$work = $this->worker->rawBuffer->waitData('_work');
        $work = [];

        if (empty($work) || empty($work[1])) {
            return;
        }

        return empty($work[1]['end_date']);
    }
}
