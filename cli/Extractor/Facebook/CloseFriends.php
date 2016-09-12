<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class CloseFriends extends AbstractExtractor {
    private function extractAuthors(array $item, array &$idList, array &$nameList) {
        // checks for author presence
        if (isset($item['from']['id'])) {
            // if it's a new id add an entry for it
            if (! isset($idList[$item['from']['id']])) {
                // if there's a name, stores it on $nameList
                if (isset($item['from']['name'])) {
                    $nameList[$item['from']['id']] = $item['from']['name'];
                }

                // initializes author activity counter
                $idList[$item['from']['id']] = 0;
            }

            // increments author activity counter
            $idList[$item['from']['id']]++;
        }
    }

    private function extractReactions(array $item, array &$idList, array &$nameList) {
        // checks for reaction presence
        if (isset($tag['id'])) {
            // if it's a new id add an entry for it
            if (! isset($idList[$tag['id']])) {
                // if there's a name, stores it on $nameList
                if (isset($tag['name'])) {
                    $nameList[$tag['id']] = $tag['name'];
                }

                // initializes author activity counter
                $idList[$tag['id']] = 0;
            }

            // increments author activity counter
            $idList[$tag['id']]++;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function execute() {
        $idList   = [];
        $nameList = [];

        foreach (['photos', 'posts', 'tagged'] as $topic) {
            $data = $this->worker->rawBuffer->getData($topic);
            if (empty($data)) {
                continue;
            }

            foreach ($data as $item) {
                // author
                $this->extractAuthors($item, $idList, $nameList);

                // tags
                if (isset($item['tags']['data'])) {
                    foreach ($item['tags']['data'] as $tag) {
                        $this->extractReactions($tag, $idList, $nameList);
                    }
                }

                // comments
                if (isset($item['comments']['data'])) {
                    foreach ($item['comments']['data'] as $comment) {
                        $this->extractAuthors($comment, $idList, $nameList);
                    }
                }

                // likes
                if (isset($item['likes']['data'])) {
                    foreach ($item['likes']['data'] as $like) {
                        $this->extractReactions($like, $idList, $nameList);
                    }
                }
            }
        }

        // remove profile owner from friend list
        $profileId = $this->worker->parsedBuffer->waitData('profileId');
        if ((! empty($profileId)) && (isset($idList[$profileId]))) {
            unset($idList[$profileId]);
        }

        // set a cut threshold to half of the maximum number of interactions
        $friendList = [];
        $threshold  = floor(max($idList) / 2);
        foreach ($idList as $key => $value) {
            if (($value >= $threshold) && (isset($nameList[$key]))) {
                $friendList[] = $nameList[$key];
            }
        }

        return implode(',', $friendList);
    }
}
