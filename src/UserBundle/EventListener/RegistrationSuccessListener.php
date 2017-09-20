<?php

namespace UserBundle\EventListener;

use AppBundle\Service\ApiSpotify;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RegistrationSuccessListener
 *
 * @package UserBundle\EventListener
 */
class RegistrationSuccessListener implements EventSubscriberInterface
{
    /**
     * @var \AppBundle\Service\ApiSpotify
     */
    private $apiSpotify;


    /**
     * LoginSuccessHandler constructor.
     *
     * @param ApiSpotify $apiSpotify
     */
    public function __construct(ApiSpotify $apiSpotify)
    {
        $this->apiSpotify = $apiSpotify;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'onAuthenticationSuccess',
        );
    }

    /**
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess()
    {
        return $this->apiSpotify->apiSpotifyAuthentification();
    }
}