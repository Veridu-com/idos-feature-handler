<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfCheckinsAtThirdMostRecentEducationLastYear extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        if (! isset($this->rawBuffer['profile'])) {
            return 0;
        }

        $profile = $this->rawBuffer['profile'];
        if (empty($profile['education'])) {
            return 0;
        }

        $education = $this->rawBuffer['_education'];
        if (empty($education[2]['id'])) {
            return 0;
        }

        $year   = (date('Y') - 1);
        $return = 0;

        if (isset($this->rawBuffer['locations'])) {
            $locations = $this->rawBuffer['locations'];
            if (! empty($locations)) {
                foreach ($locations as $location) {
                    if (! isset($location['created_time'], $location['place']['id'])) {
                        continue;
                    }

                    if ($location['place']['id'] !== $education[2]['id']) {
                        continue;
                    }

                    $ts = strtotime($location['created_time']);
                    if (date('Y', $ts) == $year) {
                        $return++;
                    }
                }
            }
        }

        if (isset($this->rawBuffer['links'])) {
            $links = $this->rawBuffer['links'];
            if (! empty($links)) {
                foreach ($links as $link) {
                    if (! isset($link['created_time'], $link['place']['id'])) {
                        continue;
                    }

                    if ($link['place']['id'] !== $education[2]['id']) {
                        continue;
                    }

                    $ts = strtotime($link['created_time']);
                    if (date('Y', $ts) == $year) {
                        $return++;
                    }
                }
            }
        }

        if (isset($this->rawBuffer['photos'])) {
            $photos = $this->rawBuffer['photos'];
            if (! empty($photos)) {
                foreach ($photos as $photo) {
                    if (! isset($photo['created_time'], $photo['place']['id'])) {
                        continue;
                    }

                    if ($photo['place']['id'] !== $education[2]['id']) {
                        continue;
                    }

                    $ts = strtotime($photo['created_time']);
                    if (date('Y', $ts) == $year) {
                        $return++;
                    }
                }
            }
        }

        if (isset($this->rawBuffer['posts'])) {
            $posts = $this->rawBuffer['posts'];
            if (! empty($posts)) {
                foreach ($posts as $post) {
                    if (! isset($post['created_time'], $post['place']['id'])) {
                        continue;
                    }

                    if ($post['place']['id'] !== $education[2]['id']) {
                        continue;
                    }

                    $ts = strtotime($post['created_time']);
                    if (date('Y', $ts) == $year) {
                        $return++;
                    }
                }
            }
        }

        if (isset($this->rawBuffer['statuses'])) {
            $statuses = $this->rawBuffer['statuses'];
            if (! empty($statuses)) {
                foreach ($statuses as $status) {
                    if (! isset($status['created_time'], $status['place']['id'])) {
                        continue;
                    }

                    if ($status['place']['id'] !== $education[2]['id']) {
                        continue;
                    }

                    $ts = strtotime($status['created_time']);
                    if (date('Y', $ts) == $year) {
                        $return++;
                    }
                }
            }
        }

        if (isset($this->rawBuffer['tagged'])) {
            $tagged = $this->rawBuffer['tagged'];
            if (! empty($tagged)) {
                foreach ($tagged as $tagged) {
                    if (! isset($tagged['created_time'], $tagged['place']['id'])) {
                        continue;
                    }

                    if ($tagged['place']['id'] !== $education[2]['id']) {
                        continue;
                    }

                    $ts = strtotime($tagged['created_time']);
                    if (date('Y', $ts) == $year) {
                        $return++;
                    }
                }
            }
        }

        return $return;
    }
}
