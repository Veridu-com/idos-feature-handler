<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\OAuth\PayPal;

class IsCommonName extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $name = $this->worker->parsedBuffer->waitData('firstName');
        if (is_null($name)) {
            return false;
        }

        return Utils::getInstance()->isCommonName($name);
    }
}
