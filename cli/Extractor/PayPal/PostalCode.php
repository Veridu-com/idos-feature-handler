<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\OAuth\PayPal;

class PostalCode extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['address']['postal_code'])) {
            return;
        }

        return preg_replace('/[^0-9A-Za-z]+/', '', $profile['address']['postal_code']);
    }
}
