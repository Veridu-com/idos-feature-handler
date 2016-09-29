<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

use Phinx\Seed\AbstractSeed;

class S00CountriesSeed extends AbstractSeed {
    public function run() {
        $data = [
            [
                'name' => 'Brasil',
                'code' => 'BR',
            ]
        ];

        $countries = $this->table('countries');
        $countries
            ->insert($data)
            ->save();
    }
}
