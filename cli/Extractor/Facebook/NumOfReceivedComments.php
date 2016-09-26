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

        $links = $this->worker->rawBuffer->getData('links');
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
                        
        $photos = $this->worker->rawBuffer->getData('photos');
        if (! empty($data['photos'])) {
            foreach ($data['photos'] as $photo) {
                if (isset($photo['comments']['data'])) {
                    foreach ($photo['comments']['data'] as $comment) {
                        if (isset($comment['from']['id'])) {
                            if (!isset($ids[$comment['from']['id']])) {
                                $ids[$comment['from']['id']] = 0;
                            }

                            $ids[$comment['from']['id']]++;
                        }
                    }
                }
            }
        }
                        

        $posts = $this->worker->rawBuffer->getData('posts');
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
                        

        $statuses = $this->worker->rawBuffer->getData('statuses');
        if (! empty($statuses)) {
            foreach ($statuses as $status) {
                if (isset($status['comments']['data'])) {
                    foreach ($status['comments']['data'] as $comment) {
                        if (isset($comment['from']['id'])) {
                            if (!isset($ids[$comment['from']['id']])) {
                                $ids[$comment['from']['id']] = 0;
                            }

                            $ids[$comment['from']['id']]++;
                        }
                    }
                }
            }
        }
                        

        $tagged = $this->worker->rawBuffer->getData('tagged');
        if (! empty($tagged)) {
            foreach ($tagged as $tagged) {
                if (isset($tagged['comments']['data'])) {
                    foreach ($tagged['comments']['data'] as $comment) {
                        if (isset($comment['from']['id'])) {
                            if (!isset($ids[$comment['from']['id']])) {
                                $ids[$comment['from']['id']] = 0;
                            }

                            $ids[$comment['from']['id']]++;
                        }
                    }
                }
            }
        }
                        

        $profile = $this->worker->rawBuffer->getData('profile');
        if (isset($profile['id']) && isset($ids[$profile['id']])) {
            unset($ids[$profile['id']]);
        }

        return count($ids);
    }
}
