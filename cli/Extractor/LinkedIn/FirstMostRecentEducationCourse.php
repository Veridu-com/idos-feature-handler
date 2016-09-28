<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentEducationCourse extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer['profile'];

        if (empty($profile['educations']) || empty($profile['educations']['values'])) {
            return;
        }

        $education = (array) $this->worker->rawBuffer['_education'];

        if (empty($education[0]) || empty($education[0]['course'])) {
            return;
        }

        return $education[0]['course'];
    }
}
