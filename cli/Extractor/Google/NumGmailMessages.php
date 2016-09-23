<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class NumGmailMessages extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profileGmail = $this->worker->rawBuffer->getData('profile_gmail');

        if (empty($profileGmail)) {
            return 0;
        }

        return $profileGmail['messagesTotal'];
    }
}
