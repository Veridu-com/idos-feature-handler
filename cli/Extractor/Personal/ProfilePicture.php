<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class ProfilePicture extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $picture = $this->worker->rawBuffer->getData('picture');

        if (empty($picture)) === false) {
        //if (empty($picture) || Filter::validate($picture, Filter::URL) === false) {
            return;
        }

        return $picture;
    }
}
