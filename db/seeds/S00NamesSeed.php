<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

use Phinx\Seed\AbstractSeed;

class S00NamesSeed extends AbstractSeed {
    public function run() {
        $data = [
            [
                'country'       => 'Brasil',
                'name'          => 'zezinho',
                'gender'        => 'm',
                'soundex'       => 'Z250',
                'metaphone'     => 'MHMT',
                'dmetaphone1'   => 'MHMT',
                'dmetaphone2'   => 'MHMT',
            ]
        ];

        $names = $this->table('names');
        $names
            ->insert($data)
            ->save();
    }
}
