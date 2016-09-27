<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class EmailAddress extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $email = $this->worker->rawBuffer->getData('email');

        //@FIXME
        if (empty($email)) {
        //if (empty($email) || Filter::validate($email, Filter::EMAIL) === false)
            return;
        }

        return intval($email);
    }
}
