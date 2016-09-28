<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Dropbox;

use Cli\Extractor\AbstractExtractor;

class Files extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        return [];
        $contents = $this->rawBuffer->getData('contents');

        if (empty($contents)) {
            return [];
        }

        $_files = [];
        foreach ($contents as $content) {
            foreach ($content['contents'] as $item) {
                if ($item['is_dir']) {
                    continue;
                }

                $_files[] = [
                    'path'     => $item['path'],
                    'bytes'    => $item['bytes'],
                    'modified' => $item['modified']
                ];
            }
        }

        return $_files;
    }
}
