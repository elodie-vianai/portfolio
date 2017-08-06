<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TrainingController extends Controller
{
    /**
     * @Route ("/formations", name="trainings")
     */
    public function formationsAction(){
        $em = $this->getDoctrine()->getManager();

        // Get all the trainings
        $trainings = $em->getRepository('AppBundle:Training')
            ->findBy(
                array(),
                array('endAt' => 'desc'),
                null,
                0
            );
//        ->findAll();

        return $this->render('AppBundle:public:trainings.html.twig',array(
            'trainings' => $trainings
        ));
    }
}