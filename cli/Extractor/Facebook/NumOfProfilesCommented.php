<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfProfilesCommented extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $ids = [];
        foreach (['photos', 'posts', 'tagged'] as $topic) {
            $data = $this->worker->rawBuffer->getData($topic);
            if (empty($data)) {
                continue;
            }

            foreach ($data as $item) {
                if (isset($item['comments']['data'])) {
                    foreach ($item['comments']['data'] as $comment) {
                        if (isset($comment['from']['id'])) {
                            $ids[$comment['from']['id']] = true;
                        }
                    }
                }
            }
        }

        $profileId = $this->worker->parsedBuffer->waitData('profileId');
        unset($ids[$profileId]);

        return count($ids);
    }
}
