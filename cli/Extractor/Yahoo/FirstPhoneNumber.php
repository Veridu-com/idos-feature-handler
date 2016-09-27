<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\OAuth\PayPal;

class FirstPhoneNumber extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['phones'][0]) || empty($profile['phones'][0]['number'])) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->phoneNumber($profile['phone_number']);
    }
}
