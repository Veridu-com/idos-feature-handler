<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumFriendsWithSameLastName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $lastName = strtolower($this->worker->parsedBuffer['lastName']);
        if (empty($lastName)) {
            return 0;
        }

        if (! isset($this->worker->rawBuffer['friends'])) {
            return 0;
        }

        $friends = $this->worker->rawBuffer['friends'];
        $count   = 0;
        foreach ($friends as $friend) {
            if (empty($friend['last_name'])) {
                continue;
            }

            if ($lastName === $this->worker->nameParser->lastName($friend['last_name'])) {
                $count++;
            }
        }

        return $count;
    }
}
