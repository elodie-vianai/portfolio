<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route ("/detail-projet/{id}", name="projectDetail")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function projectDetailAction($id){
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('AppBundle:Project')
            ->find($id);

        return $this->render('AppBundle:public:projectDetail.html.twig', array(
            'project' => $project,
        ));
    }
}