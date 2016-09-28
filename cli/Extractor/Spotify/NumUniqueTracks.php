<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class NumUniqueTracks extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $tracks = $this->rawBuffer->waitData('_tracks');

        if (empty($tracks)) {
            return 0;
        }

        return count($tracks);
    }
}
