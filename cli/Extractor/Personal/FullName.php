<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class FullName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $firstname = $this->rawBuffer->getData('firstname');
        $lastname  = $this->rawBuffer->getData('lastname');

        if (empty($firstname) || empty($lastname)) {
            return;
        }

        return sprintf('%s %s', trim($firstname), trim($lastname));
    }
}
