<?php

namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

/**
 * Class ApiSpotify
 *
 * @package AppBundle\Service
 */
class ApiSpotify
{
    /**
     * @var ContainerInterface
     */
    private $container;


    /**
     * APISpotify constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


//    public function getSpotify(){
//        $api = new SpotifyWebAPI();
//        $api->setAccessToken($_SESSION['spotify_token']);
//        // récupère la liste des playlists publiques
//        $listPlaylists = $api->getUserPlaylists('1157591261', ['limit' => 5]);
//        $playlists = [];
//        foreach ($listPlaylists->items as $item) {
//            $temp = [];
//            $tempId[] = $item->id;
//            foreach ($tempId as $i) {
//                $temp['idPlaylist'] = $i;
//            }
//            $tempName[] = $item->name;
//            foreach ($tempName as $i) {
//                $temp['namePlaylist'] = $i;
//            }
//            $tempHref[] = $item->href;
//            foreach ($tempHref as $i) {
//                $temp['hrefPlaylist'] = $i;
//            }
//            $playlists[] = $temp;
//        }
//
//        return $playlists;
//    }
//
//
//    public function spotifyAuthentification()
//    {
////        Response $response
////        $router = $this->container->get('router');
//
//        $session = new Session(
//            'da8c033ac8bb4c16a9be33cbd7501e58',
//            '97e33270196d42f5a953524381ea5cda',
//            'http://portfolio-v2.dev:8080/spotify'
//        );
//        dump($this->container->get('session'));die;
//        if (isset($_GET['code'])) {
//            $session->requestAccessToken($_GET['code']);
//            $_SESSION['spotify_token'] = $session->getAccessToken();
//        }
//        dump($response);
//            return 'homepage';
//
//    }
//
//    public function apiSpotifyAuthentification()
//    {
//        $session = new Session(
//            'da8c033ac8bb4c16a9be33cbd7501e58',
//            '97e33270196d42f5a953524381ea5cda',
//            'http://portfolio-v2.dev:8080/spotify'
//        );
//        $api = new SpotifyWebAPI();
//        if (isset($_GET['code'])) {
//            $session->requestAccessToken($_GET['code']);
//            $api->setAccessToken($session->getAccessToken());
//            print_r($api->me());
//            exit();
//        } else {
//            $options = [
//                'scopes' => ['user-read-private',
//                    'user-read-email', //accéder aux infos de l'utilisateur
//                    'playlist-read-private', //accéder aux playlists
//                    'playlist-read-collaborative', //accéder aux playlists
//                    'user-read-currently-playing', //accéder au titre actuel
//                    'user-modify-playback-state',
//                ],
//            ];
//            header('Location: ' . $session->getAuthorizeUrl($options));
//            die;
//        }
//    }
}