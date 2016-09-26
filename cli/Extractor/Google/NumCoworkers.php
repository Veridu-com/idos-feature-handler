<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class NumCoworkers extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $plus = $this->worker->rawBuffer->getData('plus');
        $circles = $this->worker->rawBuffer->getData('circles');

        if (empty($plus['organizations']) || empty($circles)) {
            return 0;
        }

        $companies = [];
        $coworkers = [];
        foreach ($plus['organizations'] as $organization) {
            if ($organization['type'] === 'work' && !empty($organization['name'])) {
                $companies[] = $organization['name'];
            }
        }

        $_circles = $this->worker->rawBuffer->waitData('_circles');
        foreach ($_circles as $circle) {
            if (empty($circle['organizations'])) {
                continue;
            }

            foreach ($circle['organizations'] as $organization) {
                if ($organization['type'] === 'work' && !empty($organization['name']) && in_array($organization['name'], $companies)) {
                    $coworkers[$circle['id']] = true;
                }
            }
        }
        
        return count($coworkers);
    }
}
