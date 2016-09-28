<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class ProfileAge extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $age = null;
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property) {
            if (! isset($this->rawBuffer[$property])) {
                continue;
            }

            $data = $this->rawBuffer[$property];
            if (empty($data)) {
                continue;
            }

            foreach ($data as $item) {
                if (empty($item['created_time'])) {
                    $timestamp = strtotime($item['updated_time']);
                } else {
                    $timestamp = strtotime($item['created_time']);
                }

                if ($timestamp === false) {
                    continue;
                }

                if ($age === null || $timestamp < $age) {
                    $age = $timestamp;
                }
            }
        }

        return $age;
    }
}
