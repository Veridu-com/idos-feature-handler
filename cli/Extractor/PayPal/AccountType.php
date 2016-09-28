<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\PayPal;

class AccountType extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');

        if (empty($profile['account_type'])) {
            return;
        }

        return $profile['account_type'];
    }
}
