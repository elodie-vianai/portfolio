<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
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
//        var_dump($projects);var_dump($lastProject);die;

        //users
        return $this->render('AppBundle:home:default.html.twig', array(
            'projects'      =>  $projects,
            'lastProject'    =>  $lastProject
        ));
    }
}
