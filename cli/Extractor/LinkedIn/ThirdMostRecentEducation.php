<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class ThirdMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['educations']) || empty($profile['educations']['values'])) {
            return;
        }

        $education = $this->worker->rawBuffer->waitData('_education');

        if (empty($education[2]) || empty($education[2]['name'])) {
            return;
        }

        return $education[2]['name'];
    }
}
