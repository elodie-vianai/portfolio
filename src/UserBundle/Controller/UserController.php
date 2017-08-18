<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use UserBundle\Entity\User;

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

    /**
     * @Route("/profile/supprimer/{id}", name="delete-user")
     * @param User $user
     * @param Request $request
     * @return RedirectResponse|Response
     * @internal param $id
     */
    public function deleteAction(User $user, Request $request)
    {
        if (null === $user->getId()) {
            throw new NotFoundHttpException('L\'utilisateur d\'id ' . $user->getId() . 'n\'existe pas.');
        }


        if ($this->getUser() == $user) {
            $currentUser = 'currentUser';
        }
//        else{
////            $currentUser = 'admin';
//        }

        // Creation of an empty form that will contain only the CSRF field to protect the deletion from this flaw
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->remove($user);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'L\'utilisateur a bien été supprimée.');


            if (isset($currentUser))
            {
                return $this->redirectToRoute('homepage');
            }
            else {
                return $this->redirectToRoute('crud-users');
            }
        }

        return $this->render('@User/Profile/delete_content.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
}