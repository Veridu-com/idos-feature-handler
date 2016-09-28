<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class HomeAddress extends AbstractExtractor {
    const SUPPORT_DATA = true;

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer->getData('profile');

        if (empty($profile['addresses'])) {
            return;
        }

        $return = null;
        foreach ($profile['addresses'] as $address) {
            if ($address['type'] === 'HOME') {
                $return = $address;
                break;
            }
        }

        return $return;
    }
}
