<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfPosts extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['posts'])) {
            return 0;
        }

        $posts = $this->rawBuffer['posts'];
        if (empty($posts)) {
            return 0;
        }

        return count($posts);
    }
}
