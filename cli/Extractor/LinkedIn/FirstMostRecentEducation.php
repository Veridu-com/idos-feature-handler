<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['educations']) || empty($profile['educations']['values'])) {
            return null;
        }

        $education = $this->worker->rawBuffer->waitData('_education');

        if (empty($education[0]) || empty($education[0]['name'])) {
            return null;
        }

        return $education[0]['name'];
    }
}
