<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class MostCommonArtist extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $tracks = $this->worker->rawBuffer->getData('tracks');

        if (empty($tracks)) {
            return [];
        }

        $count = [];
        foreach($tracks as $track) {
            foreach ($track['track']['artists'] as $artist) {
                if (! isset($count[$artist['name']])) {
                    $count[$artist['name']] = 0;
                }

                $count[$artist['name']]++;
            }
        }

        arsort($count);

        return array_keys($count);
    }
}
