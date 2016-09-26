<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class FirstMostCommonArtist extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $tracks = $this->worker->rawBuffer->getData('tracks');

        if (empty($tracks)) {
            return;
        }

        $artist = $this->worker->rawBuffer->waitData('_mostCommonArtist');
        if (empty($artist[0])) {
            return;
        }

        return $artist[0];
    }
}
