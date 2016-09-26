<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class IsInRelationship extends AbstractExtractor {
    public function execute() {
        $relationship = $this->worker->rawBuffer->getData('relationshipStatus');

        if (empty($relationship)) {
            return;
        }

        return in_array($relationship, array('In a relationship', 'Engaged', 'Married', 'In a civil union', 'In a domestic partnership', 'In an open relationship', 'It\'s complicated'));
    }
}
