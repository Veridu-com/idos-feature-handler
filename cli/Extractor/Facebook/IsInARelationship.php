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
        if (! isset($this->rawBuffer['profile'])) {
            return '';
        }

        $profile = $this->rawBuffer['profile'];
        if (empty($profile['relationshipStatus'])) {
            return '';
        }

        return in_array(
            $profile['relationshipStatus'],
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
