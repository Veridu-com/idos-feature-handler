<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

use Phinx\Seed\AbstractSeed;

class S00CitiesSeed extends AbstractSeed {
    public function run() {
        $data = [
            [
                'name'                  => 'São Carlos',
                'alternate_name'        => 'São Carlos do Pinhal',
                'region'                => 'SP',
                'country'               => 'BR',
            ]
        ];

        $cities = $this->table('cities');
        $cities
            ->insert($data)
            ->save();
    }
}
