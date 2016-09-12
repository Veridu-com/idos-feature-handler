<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfReceivedLikes extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profileId = $this->worker->parsedBuffer->waitData('profileId');

        $total = 0;
        foreach (['photos', 'posts', 'tagged'] as $topic) {
            $data = $this->worker->rawBuffer->getData($topic);
            if (empty($data)) {
                continue;
            }

            foreach ($data as $item) {
                if (isset($item['likes']['data'])) {
                    foreach ($item['likes']['data'] as $like) {
                        if (isset($like['id'])) {
                            // dismiss likes from the profile owner
                            if ($like['id'] === $profileId) {
                                continue;
                            }

                            $total++;
                        }
                    }
                }
            }
        }

        return $total;
    }
}
