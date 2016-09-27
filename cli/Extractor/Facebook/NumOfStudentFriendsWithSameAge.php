<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfStudentFriendsWithSameAge extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $friends = $this->worker->rawBuffer->getData('friends');

        if (empty($friends)) {
            return 0;
        }

        $birthYear = $this->worker->parsedBuffer->waitData('birthYear');
        if (empty($birthYear)) {
            return 0;
        }

        $_friends = $this->worker->rawBuffer->waitData('_friends');
        $return   = 0;
        foreach ($_friends as $friend) {
            if (empty($friend['birthday']) || empty($friend['education'])) {
                continue;
            }

            if (preg_match('/^([0-9]2\/[0-9]2\/)?([0-9]4)$/', $friend['birthday'], $matches)) {
                if ($birthYear != $matches[2]) {
                    continue;
                }

                foreach ($friend['education'] as $education) {
                    if (isset($education['year']['name']) && $education['year']['name'] >= date('Y')) {
                        $return++;
                        break;
                    }
                }
            }
        }

        return $return;
    }
}
