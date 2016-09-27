<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfGroupsAdministrating extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $groups = $this->worker->rawBuffer->getData('groups');

        if (empty($groups)) {
            return 0;
        }

        $return = 0;
        foreach ($groups as $group) {
            if (isset($group['administrator']) && $group['administrator']) {
                $return++;
            }
        }

        return $return;
    }
}
