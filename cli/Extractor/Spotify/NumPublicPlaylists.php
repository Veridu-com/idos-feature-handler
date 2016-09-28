<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class NumPublicPlaylists extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $playlists = $this->rawBuffer->waitData('_playlists');

        if (empty($playlists)) {
            return 0;
        }

        $return = 0;
        foreach ($playlists as $playlist) {
            if ($playlist['public']) {
                $return++;
            }
        }

        return $return;
    }
}
