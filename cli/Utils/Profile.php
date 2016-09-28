<?php

declare(strict_types = 1);

namespace Cli\Utils;

final class Profile {
    public static function facebookFriends($data) {
        return $data['friends'];
    }

    public static function facebookGraph($data) {
        $friends = [];
        if (! empty($data['links']))
            foreach ($data['links'] as $link) {
                $friends[$link['from']['name']] = 0;
                if (isset($link['tags']['data'])) {
                    foreach ($link['tags']['data'] as $tag)
                        if (isset($tag['name']))
                            $friends[$tag['name']] = 0;
                }
                if (isset($link['comments']['data'])) {
                    foreach ($link['comments']['data'] as $comment)
                        if (isset($comment['from']['name']))
                            $friends[$comment['from']['name']] = 0;
                }
                if (isset($link['likes']['data'])) {
                    foreach ($link['likes']['data'] as $like)
                        if (isset($like['name']))
                            $friends[$like['name']] = 0;
                }
            }

        if (! empty($data['photos']))
            foreach ($data['photos'] as $photo) {
                $friends[$photo['from']['name']] = 0;
                if (isset($photo['tags']['data'])) {
                    foreach ($photo['tags']['data'] as $tag)
                        if (isset($tag['name']))
                            $friends[$tag['name']] = 0;
                }
                if (isset($photo['comments']['data'])) {
                    foreach ($photo['comments']['data'] as $comment)
                        if (isset($comment['from']['name']))
                            $friends[$comment['from']['name']] = 0;
                }
                if (isset($photo['likes']['data'])) {
                    foreach ($photo['likes']['data'] as $like)
                        if (isset($like['name']))
                            $friends[$like['name']] = 0;
                }
            }

        if (! empty($data['posts']))
            foreach ($data['posts'] as $post) {
                if (isset($post['comments']['data'])) {
                    foreach ($post['comments']['data'] as $comment)
                        if (isset($comment['from']['name']))
                            $friends[$comment['from']['name']] = 0;
                }
                if (isset($post['likes']['data'])) {
                    foreach ($post['likes']['data'] as $like)
                        if (isset($like['name']))
                            $friends[$like['name']] = 0;
                }
            }

        if (! empty($data['statuses']))
            foreach ($data['statuses'] as $status) {
                $friends[$status['from']['name']] = 0;
                if (isset($status['to']['data'])) {
                    foreach ($status['to']['data'] as $to)
                        $friends[$to['name']] = 0;
                }
                if (isset($status['comments']['data'])) {
                    foreach ($status['comments']['data'] as $comment)
                        if (isset($comment['from']['name']))
                            $friends[$comment['from']['name']] = 0;
                }
                if (isset($status['likes']['data'])) {
                    foreach ($status['likes']['data'] as $like)
                        if (isset($like['name']))
                            $friends[$like['name']] = 0;
                }
            }

        if (! empty($data['tagged']))
            foreach ($data['tagged'] as $tagged) {
                $friends[$tagged['from']['name']] = 0;
                if (isset($tagged['to']['data']))
                    foreach ($tagged['to']['data'] as $to)
                        $friends[$to['name']] = 0;
                if (isset($tagged['comments']['data'])) {
                    foreach ($tagged['comments']['data'] as $comment)
                        if (isset($comment['from']['name']))
                            $friends[$comment['from']['name']] = 0;
                }
                if (isset($tagged['likes']['data'])) {
                    foreach ($tagged['likes']['data'] as $like)
                        if (isset($like['name']))
                            $friends[$like['name']] = 0;
                }
            }

        if (isset($data['profile']['first_name'], $data['profile']['last_name']))
            unset($friends["{$data['profile']['first_name']} {$data['profile']['last_name']}"]);

        $return = [];
        foreach (array_keys($friends) as $friend)
            $return[] = Matcher::normalize_string($friend);

        //$friends = $data['friends'];
        if (empty($friends))
            return $return;

        foreach ($friends as $friend) {
            if ((empty($friend['first_name'])) && (empty($friend['last_name'])))
                continue;
            $return[] = Matcher::normalize_string("{$friend['first_name']} {$friend['last_name']}");
        }

        return array_unique($return);
    }

    public static function googleCircles($data) {
        //@FIXME
        return $data['circles'];
        /*$mongo = new Mongo;
        $circles = $mongo->selectCollection('google', 'circles')->findOne(array('id' => $profile_id));
        if (empty($circles['list'])) {
            $mongo->close();
            return array();
        }

        $return = array();
        $docs = $mongo->selectCollection('google', 'profile')->find(array(
            'id' => array(
                '$in' => $circles['list']
            )
        ));
        foreach ($docs as $doc) {
            unset($doc['_id']);
            $key = array_search($doc['id'], $circles['list']);
            if ($key !== false)
                unset($circles['list'][$key]);
            $return[] = $doc;
        }
        if (empty($circles['list']))
            return $return;
        $docs = $mongo->selectCollection('google', 'plus')->find(array(
            'id' => array(
                '$in' => array_values($circles['list'])
            )
        ));
        foreach ($docs as $doc) {
            unset($doc['_id']);
            $return[] = $doc;
        }
        $mongo->close();
        return $return;*/
    }

    public static function googleGraph($data) {
        $circles = self::googleCircles($data);
        if (empty($circles))
            return [];

        $return = [];
        foreach ($circles as $circle) {
            if (! empty($circle['displayName']))
                $return[] = Matcher::normalize_string($circle['displayName']);
            elseif (! empty($circle['name'])) {
                if (is_array($circle['name']))
                    $return[] = Matcher::normalize_string(implode(' ', $circle['name']));
                else
                    $return[] = Matcher::normalize_string($circle['name']);
            }
        }

        return array_unique($return);
    }

    public static function linkedinConnections($data) {
        //@FIXME
        return [];
        /*$mongo = new Mongo;
        $connections = $mongo->selectCollection('linkedin', 'connections')->findOne(array('id' => $profile_id));
        if (empty($connections['list'])) {
            $mongo->close();
            return array();
        }

        $return = array();
        $docs = $mongo->selectCollection('linkedin', 'profile')->find(array(
            'id' => array(
                '$in' => $connections['list']
            )
        ));
        foreach ($docs as $doc) {
            unset($doc['_id']);
            $return[] = $doc;
        }
        $mongo->close();
        return $return;*/
    }

    public static function spotifyPlaylists($data) {
        if (is_null($data['playlists']))
            return false;

        if (isset($data['playlists']['_id']))
            unset($data['playlists']['_id']);

        return $data;
    }

    public static function spotifyTracks($data) {
        if (is_null($data['tracks']))
            return false;

        if (isset($data['tracks']['_id']))
            unset($data['tracks']['_id']);

        return $data;
    }
}
