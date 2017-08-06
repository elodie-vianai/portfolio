<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{
    /**
     * @Route ("/competences", name="skills")
     */
    public function skillsAction(){
        $skills = $this->getDoctrine()->getManager()->getRepository('AppBundle:Skill')->findAll();

        return $this->render('AppBundle:public:skills.html.twig', array(
            'skills' => $skills,
        ));
    }

}