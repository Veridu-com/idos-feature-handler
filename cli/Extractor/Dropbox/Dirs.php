<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Dropbox;

use Cli\Extractor\AbstractExtractor;

class Dirs extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        return [];
        $contents = $this->worker->rawBuffer->getData('contents');

        if (empty($contents)) {
            return [];
        }

        $_dirs = [];
        foreach ($contents as $content) {
            foreach ($content['contents'] as $item) {
                if ($item['is_dir']) {
                    $_dirs[] = [
                        'path' => $item['path'],
                        'shared_folder_id' => isset($item['shared_folder']['shared_folder_id']) ? $item['shared_folder']['shared_folder_id'] : null,
                        'modified' => $item['modified']
                    ];
                }
            }
        }

        return $_dirs;
    }
}
