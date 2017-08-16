<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Experience;
use AppBundle\Form\ExperienceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $em->getRepository('AppBundle:Experience')->experiences();

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


    /**
     * @Route("/admin/experiences", name="crud-experiences")
     * @return Response
     */
    public function crudAction(){
        $experiences = $this->getDoctrine()->getManager()->getRepository('AppBundle:Experience')->findBy(
            array(),
            array('endAt' => 'desc'),
            null,
            0
        );

        return $this->render('@App/admin/experiences/crud.html.twig', array(
            'experiences' => $experiences
        ));
    }


    /**
     * @Route("/admin/experiences/ajouter", name="add-experience")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $experience = new Experience();

        $form = $this->createForm(ExperienceType::class, $experience);

        // If the request is in POST and the values are validated by the Validator
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Record of the object $training into the database
            $this->getDoctrine()->getManager()->persist($experience);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'Expérience bien enregistrée !');

            return $this->redirectToRoute('crud-experiences');
        }

        return $this->render('@App/admin/experiences/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("admin/experiences/modifier/{id})", name="edit-experience")
     * @param Experience $experience
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editAction(Experience $experience, Request $request)
    {
        if (null === $experience){
            throw new NotFoundHttpException('L\'expérience demandée n\'existe pas.');
        }

        $form = $this->createForm(ExperienceType::class , $experience);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'L\expérience a bien été modifiée.');

            return $this->redirectToRoute('crud-experiences');
        }

        return $this->render('@App/admin/experiences/edit.html.twig', array(
            'experience'  => $experience,
            'form'      => $form
        ));
    }


    /**
     * @Route("/admin/experiences/supprimer/{id}", name="delete-experience")
     * @param Experience $experience
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function deleteAction(Experience $experience, Request $request){
        if (null === $experience->getId()) {
            throw new NotFoundHttpException('L\'expérience d\'id ' . $experience->getId() . 'n\'existe pas.');
        }

        // Creation of an empty form that will contain only the CSRF field to protect the deletion from this flaw
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->remove($experience);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'L\'expérience a bien été supprimée.');

            return $this->redirectToRoute('crud-experiences');
        }

        return $this->render('@App/admin/experiences/delete.html.twig', array(
            'experience' => $experience,
            'form' => $form->createView(),
        ));
    }
}