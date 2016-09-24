<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\OAuth\PayPal;

class FirstName extends \Thread {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $name = $this->worker->parsedBuffer->waitData('fullName');

        if (empty($name)) {
            return null;
        }

        //@FIXME
        return Utils::getInstance()->firstName($name);
    }
}
