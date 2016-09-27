<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class DobVerified extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $dob = $this->worker->rawBuffer->getData('dob');

        if (empty($dob)) {
            return false;
        }

        if (! empty($dob['DOB']['TracesmartDOB']) && $dob['DOB']['TracesmartDOB'] > 0) {
            return true;
        }

        if (! empty($dob['DOB']['ExperianDOB']) && $dob['DOB']['ExperianDOB'] > 0) {
            return true;
        }

        if (! empty($dob['DOB']['EquifaxDOB']) && $dob['DOB']['EquifaxDOB'] > 0) {
            return true;
        }

        return false;
    }
}
