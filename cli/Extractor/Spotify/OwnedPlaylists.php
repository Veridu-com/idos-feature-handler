<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class OwnedPlaylists extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $playlists = $this->rawBuffer->waitData('_playlists');

        if (empty($playlists)) {
            return [];
        }

        $ownedPlaylists = [];

        foreach ($playlists as $playlist) {
            if ($playlist['owner'] == $data['profile']['id']) {
                $ownedPlaylists[] = $playlist['id'];
            }
        }

        return $ownedPlaylists;
    }
}
