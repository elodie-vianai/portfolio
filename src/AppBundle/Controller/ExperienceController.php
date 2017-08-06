<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ExperienceController extends Controller
{
    /**
     * @Route ("/experiences", name="experiences")
     */
    public function experiencesAction(){
        $em = $this->getDoctrine()->getManager();

        $experiences = $em->getRepository('AppBundle:Experience')
            ->findBy(
                array(),
                array('endAt' => 'desc'),
                null,
                0
            );

        $projects = $em->getRepository('AppBundle:Project')
            ->findBy(
                array(),
                array('year' => 'desc'),
                null,
                0
            );

        return $this->render('AppBundle:public:experiences.html.twig', array(
            'experiences'   => $experiences,
            'projects'      => $projects
        ));
    }
}