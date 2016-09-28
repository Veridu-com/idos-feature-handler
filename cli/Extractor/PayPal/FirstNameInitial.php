<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\PayPal;

class FirstNameInitial extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $name = $this->parsedBuffer->waitData('fullName');

        if (empty($name)) {
            return;
        }

        //@FIXME
        return Utils::getInstance()->firstNameInitial($name);
    }
}
