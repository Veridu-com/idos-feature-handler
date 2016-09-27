<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfCoworkers extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        $friends = $this->worker->rawBuffer->getData('friends');

        if (empty($profile['work']) || empty($friends)) {
            return 0;
        }

        $companies = [];

        foreach ($profile['work'] as $company) {
            if (isset($company['employer']['id'])) {
                $companies[] = $company['employer']['id'];
            }
        }

        $_friends = $this->worker->rawBuffer->waitData('_friends');
        $return   = 0;
        foreach ($_friends as $friend) {
            if (empty($friend['work'])) {
                continue;
            }

            foreach ($friend['work'] as $work) {
                if ((isset($work['employer']['id'])) && (in_array($work['employer']['id'], $companies))) {
                    $return++;
                    break;
                }
            }
        }

        return $return;
    }
}
