<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFamilyMembers extends AbstractExtractor {
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
        if ($lastName === null) {
            return 0;
        }

        $count = 0;
        foreach ($family as $person) {
            if (empty($person['last_name'])) {
                continue;
            }

            if ($lastName === $this->worker->nameParser->lastName($person['last_name'])) {
                $count++;
            }
        }

        return $count;
    }
}
