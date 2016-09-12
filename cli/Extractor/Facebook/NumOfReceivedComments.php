<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfReceivedComments extends AbstractExtractor {
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
                if (isset($item['comments']['data'])) {
                    foreach ($item['comments']['data'] as $comment) {
                        if (isset($comment['from']['id'])) {
                            // dismiss comments from the profile owner
                            if ($comment['from']['id'] === $profileId) {
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
