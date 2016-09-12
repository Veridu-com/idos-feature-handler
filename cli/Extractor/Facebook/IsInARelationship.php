<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class IsInARelationship extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        if (empty($profile['relationship_status'])) {
            return false;
        }

        return in_array(
            $profile['relationship_status'],
            [
                'In a relationship',
                'Engaged',
                'Married',
                'In a civil union',
                'In a domestic partnership',
                'In an open relationship',
                'It\'s complicated'
            ]
        );
    }
}
