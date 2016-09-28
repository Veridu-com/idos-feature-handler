<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Twitter;

use Cli\Extractor\AbstractExtractor;

class NumOfRetweetedTweets extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $statuses = $this->worker->rawBuffer->getData('statuses');

        if (empty($statuses)) {
            return 0;
        }

        $count = 0;
        foreach ($statuses as $status) {
            if (empty($status['favorited']) && empty($status['retweeted']) && ! empty($status['retweet_count'])) {
                $count++;
            }
        }

        return $count;
    }
}