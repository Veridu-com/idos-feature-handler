<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

use Phinx\Seed\AbstractSeed;

class S00KnownNamesSeed extends AbstractSeed {
    public function run() {
        $data = [
            [
                'name'          => 'adam levine',
                'type'          => 'celebrity',
                'soundex'       => 'A354',
                'metaphone'     => 'ATMLFN',
                'dmetaphone1'   => 'ATMLFN',
                'dmetaphone2'   => 'ATMLFN',
            ]
        ];

        $knownNames = $this->table('known_names');
        $knownNames
            ->insert($data)
            ->save();
    }
}
