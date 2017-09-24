<?php
namespace AppBundle\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Authentication process to get the token. If the token is set, it is used. If not, we ask it to Spotify.
     *
     * @return RedirectResponse
     */
    public function apiSpotifyAuthentification()
    {
        $session = new Session(
            'e4260c06bdf44c3890f309769a80f195',
            '69ac9c880d5d4b55a81b7161d64e3222',
            'http://portfolio-v3.dev:8080/spotify'
        );

        $api = new SpotifyWebAPI();

        if (isset($_GET['code'])) {
            $session->requestAccessToken($_GET['code']);
            $api->setAccessToken($token = $session->getAccessToken());

            $this->container->get('session')->set('spotify_token', $token);

            return new RedirectResponse('/');
        } else {
            $options = [
                'scopes' => ['user-read-private',
                    'user-read-email', //accéder aux infos de l'utilisateur
                    'playlist-read-private', //accéder aux playlists
                    'playlist-read-collaborative', //accéder aux playlists
                    'user-read-currently-playing', //accéder au titre actuel
                    'user-modify-playback-state',
                ],
            ];

            return new RedirectResponse($session->getAuthorizeUrl($options));
        }
    }

    /**
     * Get public playlists from my account
     *
     * @return array
     */
    public function getPlaylistsSpotify(){
        $api = new SpotifyWebAPI();

        $api->setAccessToken($this->container->get('session')->get('spotify_token'));
        // récupère la liste des playlists publiques
        $listPlaylists = $api->getUserPlaylists('1157591261', ['limit' => 5]);

        $playlists = [];

        foreach ($listPlaylists->items as $item) {
            $temp = [];
            $tempId[] = $item->id;
            foreach ($tempId as $i) {
                $temp['idPlaylist'] = $i;
            }
            $tempName[] = $item->name;
            foreach ($tempName as $i) {
                $temp['namePlaylist'] = $i;
            }
            $tempHref[] = $item->href;
            foreach ($tempHref as $i) {
                $temp['hrefPlaylist'] = $i;
            }
            $playlists[] = $temp;
        }

        return $playlists;
    }
}