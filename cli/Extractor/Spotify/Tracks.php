<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class Tracks extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        //@FIXME
        //$tracks = Profile::spotifyTracks($data['profile']['id'])['tracks']['list'];
        $tracks = [];

        if (empty($tracks)) {
            return [];
        }

        $_tracks = [];
        foreach ($tracks as $track) {
            $_tracks[] = [
                'id' => $track['track']['id'],
                'name' => $track['track']['name'],
                'popularity' => $track['track']['popularity'],
                'added_at' => $track['added_at'],
                'added_by' => $track['added_by']['id'],
                'is_local' => $track['is_local'],
                'playlists' => $track['playlists']
            ];
        }

        return $_tracks;
    }
}
