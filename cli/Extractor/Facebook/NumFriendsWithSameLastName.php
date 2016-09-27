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
        $lastName = strtolower($this->worker->parsedBuffer->waitData('lastName'));

        if ($lastName === null) {
            return 0;
        }

        $count = 0;
        //@FIXME
        //$friends = Profile::facebookGraph($data['profile']['id']);
        $friends = [];
        foreach ($friends as $friend) {
            if ($lastName === Utils::getInstance()->lastName($friend)) {
                $count++;
            }
        }

        return $count;
    }
}
