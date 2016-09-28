<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class AgeDistribution extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['friends'])) {
            return [];
        }

        $friends = $this->rawBuffer['friends'];
        if (empty($friends)) {
            return [];
        }

        $years = [];
        foreach ($friends as $friend) {
            if (empty($friend['birthday'])) {
                continue;
            }

            if (preg_match('/^([0-9]{2}\/[0-9]{2}\/)?([0-9]{4})$/', $friend['birthday'], $matches)) {
                if (! isset($years[$matches[2]])) {
                    $years[$matches[2]] = 0;
                }

                $years[$matches[2]]++;
            }
        }

        arsort($years);

        return $years;
    }
}
