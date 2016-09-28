<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class HometownCountryName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->worker->rawBuffer['profile'])) {
            return '';
        }

        $profile = $this->worker->rawBuffer['profile'];
        if (empty($profile['hometown']) || empty($profile['hometown']['name'])) {
            return '';
        }

        if (strpos($profile['hometown']['name'], ',') === false) {
            // FIXME
            //return Utils::getInstance()->countryFromCity($profile['hometown']['name']);
            return $profile['hometown']['name'];
        }

        $name = explode(',', $profile['hometown']['name']);

        return trim(array_pop($name));
    }
}
