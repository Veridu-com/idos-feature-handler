<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfCheckinsAtSecondMostRecentEducationLastYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');

        if (empty($profile['education'])) {
            return 0;
        }

        $education = $this->worker->rawBuffer->waitData('_education');

        if (empty($education[1]['id'])) {
            return 0;
        }

        $year   = (date('Y') - 1);
        $return = 0;

        $locations = $this->worker->rawBuffer->getData('locations');
        if (! empty($locations)) {
            foreach ($locations as $location) {
                if (! isset($location['created_time'], $location['place']['id'])) {
                    continue;
                }

                if ($location['place']['id'] !== $education[1]['id']) {
                    continue;
                }

                $ts = strtotime($location['created_time']);
                if (date('Y', $ts) == $year) {
                    $return++;
                }
            }
        }

        $links = $this->worker->rawBuffer->getData('links');
        if (! empty($links)) {
            foreach ($links as $link) {
                if (! isset($link['created_time'], $link['place']['id'])) {
                    continue;
                }

                if ($link['place']['id'] !== $education[1]['id']) {
                    continue;
                }

                $ts = strtotime($link['created_time']);
                if (date('Y', $ts) == $year) {
                    $return++;
                }
            }
        }

        $photos = $this->worker->rawBuffer->getData('photos');
        if (! empty($photos)) {
            foreach ($photos as $photo) {
                if (! isset($photo['created_time'], $photo['place']['id'])) {
                    continue;
                }

                if ($photo['place']['id'] !== $education[1]['id']) {
                    continue;
                }

                $ts = strtotime($photo['created_time']);
                if (date('Y', $ts) == $year) {
                    $return++;
                }
            }
        }

        $posts = $this->worker->rawBuffer->getData('posts');
        if (! empty($posts)) {
            foreach ($posts as $post) {
                if (! isset($post['created_time'], $post['place']['id'])) {
                    continue;
                }

                if ($post['place']['id'] !== $education[1]['id']) {
                    continue;
                }

                $ts = strtotime($post['created_time']);
                if (date('Y', $ts) == $year) {
                    $return++;
                }
            }
        }

        $statuses = $this->worker->rawBuffer->getData('statuses');
        if (! empty($statuses)) {
            foreach ($statuses as $status) {
                if (! isset($status['created_time'], $status['place']['id'])) {
                    continue;
                }

                if ($status['place']['id'] !== $education[1]['id']) {
                    continue;
                }

                $ts = strtotime($status['created_time']);
                if (date('Y', $ts) == $year) {
                    $return++;
                }
            }
        }

        $tagged = $this->worker->rawBuffer->getData('tagged');
        if (! empty($tagged)) {
            foreach ($tagged as $tagged) {
                if (! isset($tagged['created_time'], $tagged['place']['id'])) {
                    continue;
                }

                if ($tagged['place']['id'] !== $education[1]['id']) {
                    continue;
                }

                $ts = strtotime($tagged['created_time']);
                if (date('Y', $ts) == $year) {
                    $return++;
                }
            }
        }

        return $return;
    }
}
