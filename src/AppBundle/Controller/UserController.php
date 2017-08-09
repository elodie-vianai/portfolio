<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/admin/utilisateurs", name="crud-users")
     * @return Response
     */
    public function crudAction(){
        $users = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findBy(
            array(),
            array('username' => 'asc'),
            null,
            0
        );

        return $this->render('@App/admin/users/crud.html.twig', array(
            'users' => $users,
        ));
    }
}