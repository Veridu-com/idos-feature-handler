<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfStudentFriends extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['friends'])) {
            return 0;
        }

        $friends = $this->rawBuffer['friends'];
        if (empty($friends)) {
            return 0;
        }

        $year   = date('Y');
        $return = 0;
        foreach ($friends as $friend) {
            if (empty($friend['education'])) {
                continue;
            }

            foreach ($friend['education'] as $education) {
                if (isset($education['year']['name']) && $education['year']['name'] >= $year) {
                    $return++;
                    break;
                }
            }
        }

        return $return;
    }
}
