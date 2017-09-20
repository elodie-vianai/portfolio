<?php

namespace UserBundle\Handler;


use AppBundle\Service\ApiSpotify;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * Class LoginSuccessHandler
 *
 * @package UserBundle\Handler
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
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
     * @param Request        $request
     * @param TokenInterface $token
     *
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        return $this->apiSpotify->apiSpotifyAuthentification();
    }
}