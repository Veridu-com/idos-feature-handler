<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class Playlists extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        //@FIXME
        //$playlists = Profile::spotifyPlaylists($data['profile']['id'])['playlists']['list'];
        $playlists = [];

        if (empty($playlists)) {
            return [];
        }

        $_playlists = [];
        foreach ($playlists as $playlist)
            $_playlists[] = [
                'id'            => $playlist['id'],
                'name'          => $playlist['name'],
                'owner'         => $playlist['owner']['id'],
                'collaborative' => $playlist['collaborative'],
                'public'        => $playlist['public'],
                'total_tracks'  => $playlist['tracks']['total']
            ];

        return $_playlists;
    }
}
