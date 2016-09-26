<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class ProfileGender extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $gender = $this->worker->rawBuffer->getData('gender');

        if (empty($gender)) {
            return;
        }

        switch (strtolower($gender)) {
            case 'm':
            case 'male':
                return 'male';

            case 'f':
            case 'female':
                return 'female';
            
            default:
                return 'other';
        }
    }
}
