<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfEventsAttended extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $events = $this->worker->rawBuffer->getData('events');

        if (empty($events)) {
            return 0;
        }

        $return = 0;
        foreach ($events as $event) {
            if (isset($event['rsvp_status']) && strtolower($event['rsvp_status']) === 'attending') {
                $return++;
            }
        }

        return $return;
    }
}
