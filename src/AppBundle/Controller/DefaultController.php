<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        // Get the repository and the entity manager
        $em =   $this->getDoctrine()->getManager();

        // Get the 5 last projects
        $projects   = $em->getRepository('AppBundle:Project')
            ->findBy(
                array(),                            // no criteria
                array('year' => 'desc'),            // sort by decreasing date
                5,                             // selection of 5 projects maximum
                0                             // from the first element
            );

        $lastProject = $em->getRepository('AppBundle:Project')
            ->findBy(
                array(),
                array('year' => 'desc', 'id' => 'desc'),
                1,
                0
            );

        //users
        $user = $this->getUser();
//        $userRoles = $user->getRoles();
//        foreach ($userRoles as $role)
//        {
//            if($role === 'ROLE_USER')
//            {
//              $this->get('ev.api.spotify')->spotifyAuthentification();
//            }
//        }


        return $this->render('AppBundle:home:default.html.twig', array(
            'projects'          =>  $projects,
            'lastProject'       =>  $lastProject,
            'user'              => $user
        ));
    }


    /**
     * @Route("/contact", name="contactPage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction()
    {
       return $this->render('AppBundle:home:contact.html.twig');
    }
}
