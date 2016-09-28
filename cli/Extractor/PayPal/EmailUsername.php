<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\PayPal;

class EmailUsername extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $email = $this->parsedBuffer->waitData('emailAddress');

        if (empty($email)) {
            return;
        }

        $email = explode('@', $email);

        return $email[0];
    }
}
