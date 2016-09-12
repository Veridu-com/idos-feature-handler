<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfPhotos extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $photos = $this->worker->rawBuffer->getData('photos');
        if (empty($photos)) {
            return 0;
        }

        return count($photos);
    }
}
