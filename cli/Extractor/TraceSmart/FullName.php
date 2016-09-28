<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\TraceSmart;

use Cli\Extractor\AbstractExtractor;

class FullName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $address = $this->rawBuffer->getData('address');

        if (empty($address)) {
            return;
        }

        if (! in_array($address['Address']['MatchType'], ['Full', 'Partial', 'Multiple'])) {
            return;
        }

        if (empty($address['Address']['MiddleName'])) {
            return ucwords(
                sprintf(
                    '%s %s',
                    strtolower(trim($address['Address']['Forename'])),
                    strtolower(trim($address['Address']['Surname']))
                )
            );
        }

        return ucwords(
            sprintf(
                '%s %s %s',
                strtolower(trim($address['Address']['Forename'])),
                strtolower(trim($address['Address']['MiddleName'])),
                strtolower(trim($address['Address']['Surname']))
            )
        );
    }
}
