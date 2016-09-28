<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class PassportVerified extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $passport = $this->rawBuffer->getData('passport');

        if (empty($passport)) {
            return false;
        }

        if (empty($passport['Passport']['MRZValid'])
            || empty($passport['Passport']['DOBValid'])
            || empty($passport['Passport']['GenderValid'])
            || empty($passport['Passport']['ExpiryValid'])
        ) {
            return false;
        }

        return
            $passport['Passport']['MRZValid'] &&
            $passport['Passport']['DOBValid'] &&
            $passport['Passport']['GenderValid'] &&
            $passport['Passport']['ExpiryValid']
        ;
    }
}
