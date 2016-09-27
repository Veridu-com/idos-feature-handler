<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\PayPal;

class LastNameInitial extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $name = $this->worker->parsedBuffer->waitData('fullName');

        if ($name === null) {
            return;
        }

        //@FIXME
        return Utils::getInstance()->lastNameInitial($name);
    }
}
