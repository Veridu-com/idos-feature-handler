<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class NumOfLinkedTwitterAccounts extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer['profile'];

        if (empty($profile['twitterAccounts']) || empty($profile['twitterAccounts']['values'])) {
            return 0;
        }

        return count($profile['twitterAccounts']['values']);
    }
}
