<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\OAuth\PayPal;

class PhoneCountryCode extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('phoneNumber');

        if (empty($profile['phone_number'])) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->phoneCountryCode($profile['phone_number']);
    }
}
