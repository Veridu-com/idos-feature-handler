<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfReceivedComments extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $ids = [];

        if (isset($this->rawBuffer['links'])) {
            $links = $this->rawBuffer['links'];
            if (! empty($links)) {
                foreach ($links as $like) {
                    if (isset($like['comments']['data'])) {
                        foreach ($like['comments']['data'] as $comment) {
                            if (isset($comment['from']['id'])) {
                                if (! isset($ids[$comment['from']['id']])) {
                                    $ids[$comment['from']['id']] = 0;
                                }

                                $ids[$comment['from']['id']]++;
                            }
                        }
                    }
                }
            }
        }

        if (isset($this->rawBuffer['photos'])) {
            $photos = $this->rawBuffer['photos'];
            if (! empty($data['photos'])) {
                foreach ($data['photos'] as $photo) {
                    if (isset($photo['comments']['data'])) {
                        foreach ($photo['comments']['data'] as $comment) {
                            if (isset($comment['from']['id'])) {
                                if (! isset($ids[$comment['from']['id']])) {
                                    $ids[$comment['from']['id']] = 0;
                                }

                                $ids[$comment['from']['id']]++;
                            }
                        }
                    }
                }
            }
        }

        if (isset($this->rawBuffer['posts'])) {
            $posts = $this->rawBuffer['posts'];
            if (! empty($posts)) {
                foreach ($posts as $post) {
                    if (isset($post['comments']['data'])) {
                        foreach ($post['comments']['data'] as $comment) {
                            if (isset($comment['from']['id'])) {
                                if (! isset($ids[$comment['from']['id']])) {
                                    $ids[$comment['from']['id']] = 0;
                                }

                                $ids[$comment['from']['id']]++;
                            }
                        }
                    }
                }
            }
        }

        if (isset($this->rawBuffer['statuses'])) {
            $statuses = $this->rawBuffer['statuses'];
            if (! empty($statuses)) {
                foreach ($statuses as $status) {
                    if (isset($status['comments']['data'])) {
                        foreach ($status['comments']['data'] as $comment) {
                            if (isset($comment['from']['id'])) {
                                if (! isset($ids[$comment['from']['id']])) {
                                    $ids[$comment['from']['id']] = 0;
                                }

                                $ids[$comment['from']['id']]++;
                            }
                        }
                    }
                }
            }
        }

        if (isset($this->rawBuffer['tagged'])) {
            $tagged = $this->rawBuffer['tagged'];
            if (! empty($tagged)) {
                foreach ($tagged as $tagged) {
                    if (isset($tagged['comments']['data'])) {
                        foreach ($tagged['comments']['data'] as $comment) {
                            if (isset($comment['from']['id'])) {
                                if (! isset($ids[$comment['from']['id']])) {
                                    $ids[$comment['from']['id']] = 0;
                                }

                                $ids[$comment['from']['id']]++;
                            }
                        }
                    }
                }
            }
        }

        $profileId = $this->parsedBuffer['profileId'];
        unset($ids[$profileId]);

        return count($ids);
    }
}
