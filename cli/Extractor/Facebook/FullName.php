<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FullName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['profile'])) {
            return '';
        }

        $profile = $this->worker->rawBuffer['profile'];
        if ((empty($profile['first_name'])) || (empty($profile['last_name']))) {
            return '';
        }

        return sprintf('%s %s', trim($profile['first_name']), trim($profile['last_name']));
    }
}
