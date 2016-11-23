<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Utils;

final class Spotify extends AbstractExtractor {
    private function _playlists(&$data) {
        if (isset($data['_playlists']))
            return $data['_playlists'];

        if (empty($data['playlists']))
            return [];

        $data['_playlists'] = [];

        foreach ($data['playlists'] as $playlist)
            $data['_playlists'][] = [
                'id'            => $playlist['id'],
                'name'          => $playlist['name'],
                'owner'         => $playlist['owner']['id'],
                'collaborative' => $playlist['collaborative'],
                'public'        => isset($playlist['public']) ? $playlist['public'] : false,
                'total_tracks'  => $playlist['tracks']['total']
            ];

        return $data['_playlists'];
    }

    private function _owned_playlists(&$data) {
        if (isset($data['_owned_playlists']))
            return $data['_owned_playlists'];

        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return [];

        $data['_owned_playlists'] = [];

        foreach ($playlists as $playlist)
            if ($playlist['owner'] == $data['profile']['id'])
                $data['_owned_playlists'][] = $playlist['id'];

        return $data['_playlists'];
    }

    private function _tracks(&$data) {
        if (isset($data['_tracks']))
            return $data['_tracks'];

        if (empty($data['tracks']))
            return [];

        $data['_tracks'] = [];

        foreach ($data['tracks'] as $track) {
            if (empty($track['track'])) {
                continue;
            }

            $data['_tracks'][] = [
                'id'         => $track['track']['id'],
                'name'       => $track['track']['name'],
                'popularity' => $track['track']['popularity'],
                'added_at'   => $track['added_at'],
                'added_by'   => $track['added_by']['id'],
                'is_local'   => $track['is_local'],
                'playlists'  => $track['playlists']
            ];
        }

        return $data['_tracks'];
    }

    private function _most_common_artist(&$data) {
        if (empty($data))
            return;
        $count = [];
        foreach($data['tracks'] as $tracks)
        foreach ($tracks['track']['artists'] as $artist) {
            if (! isset($count[$artist['name']]))
            $count[$artist['name']] = 0;
            $count[$artist['name']]++;
        }

        arsort($count);

        return array_keys($count);
    }

    private function profile_id(&$data) {
        if (empty($data['profile']['user_id'])) {
            return;
        }

        return $data['profile']['user_id'];
    }

    private function num_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        return count($playlists);
    }

    private function num_owned_playlists(&$data) {
        $owned_playlists = $this->_owned_playlists($data);

        if (empty($owned_playlists))
            return 0;

        return count($owned_playlists);
    }

    private function num_collaborative_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if ($playlist['collaborative'])
                $return++;

        return $return;
    }

    private function num_public_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if ($playlist['public'])
                $return++;

        return $return;
    }

    private function num_private_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if (! $playlist['public'] && ! $playlist['collaborative'])
                $return++;

        return $return;
    }

    private function num_unique_tracks(&$data) {
        $tracks = $this->_tracks($data);

        if (empty($tracks))
            return 0;

        return count($tracks);
    }

    private function num_playlists_tracks(&$data) {
        $playlists = $this->_playlists($data);

        $return = 0;

        foreach ($playlists as $playlist)
            $return += $playlist['total_tracks'];

        return $return;

    }

    private function num_tracks_collaborative_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if ($playlist['collaborative'])
                $return += $playlist['total_tracks'];

        return $return;
    }

    private function num_tracks_public_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if ($playlist['public'])
                $return += $playlist['total_tracks'];

        return $return;
    }

    private function num_tracks_private_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if (! $playlist['public'] && ! $playlist['collaborative'])
                $return += $playlist['total_tracks'];

        return $return;
    }

    private function num_tracks_collaborative_owned_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if (($playlist['collaborative']) && ($playlist['owner'] === $data['profile']['id']))
                $return += $playlist['total_tracks'];

        return $return;
    }

    private function num_tracks_public_owned_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if (($playlist['public']) && ($playlist['owner'] === $data['profile']['id']))
                $return += $playlist['total_tracks'];

        return $return;
    }

    private function num_tracks_private_owned_playlists(&$data) {
        $playlists = $this->_playlists($data);

        if (empty($playlists))
            return 0;

        $return = 0;

        foreach ($playlists as $playlist)
            if ((! $playlist['public']) && (! $playlist['collaborative']) && ($playlist['owner'] === $data['profile']['id']))
                $return += $playlist['total_tracks'];

        return $return;
    }

    private function profile_age(&$data) {
        // based on the first added track on an owned playlist
        $tracks          = $this->_tracks($data);
        $owned_playlists = $this->_owned_playlists($data);

        $age = null;

        if (empty($tracks))
            return;

        foreach ($tracks as $track) {
            if (! isset($track['playlists']))
                continue;

            foreach ($track['playlists'] as $item) {
                if (in_array($item, $owned_playlists)) {
                    $_age = strtotime($track['added_at']);
                    $age  = is_null($age) || $_age < $age ? $_age : $age;
                }
            }
        }

        return $age;
    }

    private function is_profile_premium(&$data) {
        return $data['profile']['product'] === 'premium' ? true : false;
    }

    private function birth(&$data, $position) {
        if (empty($data['profile']['birthdate']))
            return 0;
        if (strpos($data['profile']['birthdate'], '-') === false)
            return 0;
        $date = explode('-', $data['profile']['birthdate']);
        if (isset($date[$position]))
            return intval($date[$position]);

        return 0;
    }

    private function current_country_name(&$data) {
        if (empty($data['profile']['country']))
            return;

        return Utils::getInstance()->codeToCountry($data['profile']['country']);
    }

    private function is_common_name(&$data) {
        $name = $this->first_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isCommonName($name);
    }

    private function is_listed_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isListedName($name);
    }

    private function is_fantasy_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isFantasyName($name);
    }

    private function is_sanctioned_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isSanctionedName($name);
    }

    private function is_pep_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isPEPName($name);
    }

    private function is_celebrity_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isCelebrityName($name);
    }

    private function is_silly_name(&$data) {
        $name = $this->full_name($data);
        if (is_null($name))
            return false;

        return Utils::getInstance()->isSillyName($name);
    }

    private function name_gender(&$data) {
        $name = $this->first_name($data);
        if (is_null($name))
            return;

        return Utils::getInstance()->nameGender($name);
    }

    private function full_name(&$data) {
        if (empty($data['profile']['display_name']))
            return;

        return $data['profile']['display_name'];
    }

    private function first_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->firstName($name);
    }

    private function first_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->firstNameInitial($name);
    }

    private function middle_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->middleName($name);
    }

    private function middle_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->middleNameInitial($name);
    }

    private function last_name(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->lastName($name);
    }

    private function last_name_initial(&$data) {
        $name = $this->full_name($data);
        if (empty($name))
            return;

        return Utils::getInstance()->lastNameInitial($name);
    }

    private function email_address(&$data) {
        if ((empty($data['profile']['email'])) || (strpos($data['profile']['email'], '@') === false))
            return;

        return $data['profile']['email'];
    }

    private function email_username(&$data) {
        $email = $this->email_address($data);
        if (is_null($email))
            return;
        $email = explode('@', $email);

        return $email[0];
    }

    private function first_most_common_artist(&$data) {
        if(empty($data['tracks']))
            return;
        $artist = $this->_most_common_artist($data);
        if(empty($artist[0]))
            return;

        return $artist[0];
    }

    private function second_most_common_artist(&$data) {
        if(empty($data['tracks']))
            return;
        $artist = $this->_most_common_artist($data);
        if(empty($artist[1]))
            return;

        return $artist[1];
    }

    private function third_most_common_artist(&$data) {
        if(empty($data['tracks']))
            return;
        $artist = $this->_most_common_artist($data);
        if(empty($artist[2]))
            return;

        return $artist[2];
    }

    private function fourth_most_common_artist(&$data) {
        if(empty($data['tracks']))
            return;
        $artist = $this->_most_common_artist($data);
        if(empty($artist[3]))
            return;

        return $artist[3];
    }

    private function fifth_most_common_artist(&$data) {
        if(empty($data['tracks']))
            return;
        $artist = $this->_most_common_artist($data);
        if(empty($artist[4]))
            return;

        return $artist[4];
    }

    public function analyze(array $data) : array {
        return [
            'isActive'                             => ! empty($data),
            'profileId'                            => $this->profile_id($data),
            'isACommonName'                        => $this->is_common_name($data),
            'isListedName'                         => $this->is_listed_name($data),
            'isFantasyName'                        => $this->is_fantasy_name($data),
            'isSanctionedName'                     => $this->is_sanctioned_name($data),
            'isPEPName'                            => $this->is_pep_name($data),
            'isCelebrityName'                      => $this->is_celebrity_name($data),
            'isSillyName'                          => $this->is_silly_name($data),
            'nameGender'                           => $this->name_gender($data),
            'fullName'                             => $this->full_name($data),
            'firstName'                            => $this->first_name($data),
            'firstNameInitial'                     => $this->first_name_initial($data),
            'middleName'                           => $this->middle_name($data),
            'middleNameInitial'                    => $this->middle_name_initial($data),
            'lastName'                             => $this->last_name($data),
            'lastNameInitial'                      => $this->last_name_initial($data),
            'emailAddress'                         => $this->email_address($data),
            'emailUsername'                        => $this->email_username($data),
            'birthDay'                             => $this->birth($data, 2),
            'birthMonth'                           => $this->birth($data, 1),
            'birthYear'                            => $this->birth($data, 0),
            'countryName'                          => $this->current_country_name($data),
            'numPlaylists'                         => $this->num_playlists($data),
            'numOwnedPlaylists'                    => $this->num_owned_playlists($data),
            'numCollaborativePlaylists'            => $this->num_collaborative_playlists($data),
            'numPublicPlaylists'                   => $this->num_public_playlists($data),
            'numPrivatePlaylists'                  => $this->num_private_playlists($data),
            'numUniqueTracks'                      => $this->num_unique_tracks($data),
            'numPlaylistsTracks'                   => $this->num_playlists_tracks($data),
            'numTracksCollaborativePlaylists'      => $this->num_tracks_collaborative_playlists($data),
            'numTracksPublicPlaylists'             => $this->num_tracks_public_playlists($data),
            'numTracksPrivatePlaylists'            => $this->num_tracks_private_playlists($data),
            'numTracksCollaborativeOwnedPlaylists' => $this->num_tracks_collaborative_owned_playlists($data),
            'numTracksPublicOwnedPlaylists'        => $this->num_tracks_public_owned_playlists($data),
            'numTracksPrivateOwnedPlaylists'       => $this->num_tracks_private_owned_playlists($data),
            'profileAge'                           => $this->profile_age($data),
            'isProfilePremium'                     => $this->is_profile_premium($data),
            'firstMostCommonArtist'                => $this->first_most_common_artist($data),
            'secondMostCommonArtist'               => $this->second_most_common_artist($data),
            'thirdMostCommonArtist'                => $this->third_most_common_artist($data),
            'fourthMostCommonArtist'               => $this->fourth_most_common_artist($data),
            'fifthMostCommonArtist'                => $this->fifth_most_common_artist($data)
        ];
    }
}
