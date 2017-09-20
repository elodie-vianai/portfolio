<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SpotifyWebAPI\SpotifyWebAPI;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class SpotifyController
 *
 * @package AppBundle\Controller
 */
class SpotifyController extends Controller
{
    /**
     * @Route("/spotify", name="homepageSpotify")
     *
     * @return RedirectResponse
     */
    public function SpotifyAction(){

        $this->get('ev.api.spotify')->apiSpotifyAuthentification();

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/playlist/{idPlaylist}")
     *
     * @param $idPlaylist
     *
     * @return JsonResponse
     */
    public function GetPlaylistAction($idPlaylist){
        $api = new SpotifyWebAPI();

        $api->setAccessToken($this->get('session')->get('spotify_token'));

        // Get the name of the playlist
        $playlist = $api->getUserPlaylist('1157591261', $idPlaylist);
        $namePlaylist = $playlist->name;

        // Get the list of tracks for the playlist
        $tracksPlaylist = $api->getUserPlaylistTracks('1157591261', $idPlaylist);

        $tracks = [];
        foreach ($tracksPlaylist->items as $item) {
            $temp = [];
            $tempId[] = $item->track->id;
            foreach ($tempId as $id) {
                $temp['idTrack'] = $id;
            }
            $tempTracks[] = $item->track->name;
            foreach ($tempTracks as $track) {
                $temp['nameTrack'] = $track;
            }
            $temp['artist'] = $item->track->artists[0]->name;
            $temp['album'] = $item->track->album->name;
            $temp['previewUrl'] = $item->track->preview_url;
            $tracks[] = $temp;
        }

        $response = new JsonResponse();

        return $response->setData([
            'namePlaylist'  =>  $namePlaylist,
            'tracks'        =>  $tracks,
        ]);
    }

    /**
     * @Route("/playlist/{idPlaylist}/{trackId}")
     *
     * @param string $trackId
     *
     * @return JsonResponse
     */
    public function getTrackAction(string $idPlaylist, string $trackId){
        $api = new SpotifyWebAPI();

        $api->setAccessToken($this->get('session')->get('spotify_token'));

        $trackInfos = $api->getTrack($trackId);
        $track['idTrack'] = $trackInfos->id;
        $track['nameTrack'] = $trackInfos->name;
        $track['artistTrack'] = $trackInfos->album->artists[0]->name;
        $track['albumTrack'] = $trackInfos->album->name;
        $track['previewUrl'] = $trackInfos->preview_url;
        $track['albumImgTrack'] = $trackInfos->album->images[1]->url;

        $jsonResponse = new JsonResponse();

        return $jsonResponse->setData([
            'track' => $track,
        ]);
    }
}