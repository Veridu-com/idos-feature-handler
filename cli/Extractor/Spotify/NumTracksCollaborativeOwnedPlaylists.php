<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class NumTracksCollaborativeOwnedPlaylists extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile   = $this->rawBuffer->getData('profile');
        $playlists = $this->rawBuffer->waitData('_playlists');

        $return = 0;
        foreach ($playlists as $playlist) {
            if ($playlist['collaborative'] && $playlist['owner'] === $profile['id']) {
                $return += $playlist['total_tracks'];
            }
        }

        return $return;
    }
}
