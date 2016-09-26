<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class DlcVerified extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $driving = $this->worker->rawBuffer->getData('driving');

        if (empty($driving)) {
            return false;
        }

        if (empty($driving['DrivingLicence']['ResultFlag'])) {
            return false;
        }

        return $driving['DrivingLicence']['ResultFlag'];
    }
}
