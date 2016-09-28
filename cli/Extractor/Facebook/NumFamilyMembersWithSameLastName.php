<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumFamilyMembersWithSameLastName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['family'])) {
            return 0;
        }

        $family = $this->rawBuffer['family'];
        if (empty($family)) {
            return 0;
        }

        $lastName = $this->parsedBuffer['lastName'];
        if (empty($lastName)) {
            return 0;
        }

        $lastName = strtolower($lastName);
        $count    = 0;
        foreach ($family as $person) {
            if (empty($person['last_name'])) {
                continue;
            }

            if ($lastName === strtolower($this->worker->nameParser->lastName($person['last_name']))) {
                $count++;
            }
        }

        return $count;
    }
}
