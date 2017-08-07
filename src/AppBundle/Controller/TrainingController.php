<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Training;
use AppBundle\Form\TrainingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TrainingController extends Controller
{
    /**
     * @Route ("/formations", name="trainings")
     * @return Response
     */
    public function trainingsAction()
    {
        $em = $this->getDoctrine()->getManager();

        // Get all the trainings
        $trainings = $em->getRepository('AppBundle:Training')
            ->findBy(
                array(),
                array('endAt' => 'desc'),
                null,
                0
            );

        return $this->render('AppBundle:public:trainings.html.twig', array(
            'trainings' => $trainings,
        ));
    }


    /**
     * @Route("/admin/formations", name="crud-trainings")
     * @return Response
     */
    public function crudAction()
    {
        $trainings = $this->getDoctrine()->getManager()->getRepository('AppBundle:Training')->findBy(
            array(),
            array('endAt' => 'desc'),
            null,
            0
        );

        return $this->render('@App/admin/trainings/crud.html.twig', array(
            'trainings' => $trainings,
        ));
    }


    /**
     * @Route("/admin/formations/ajouter", name="add-training")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $training = new Training();

        $form = $this->createForm(TrainingType::class, $training);

        // If the request is in POST and the values are validated by the Validator
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Record of the object $training into the database
            $this->getDoctrine()->getManager()->persist($training);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'Formation bien enregistrée !');

            return $this->redirectToRoute('crud-trainings');
        }

        return $this->render('@App/admin/trainings/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("admin/formations/modifier/{id})", name="edit-training")
     * @param Training $training
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editAction(Training $training, Request $request)
    {
        if (null === $training){
            throw new NotFoundHttpException('La formation demandée n\'existe pas.');
        }

        $form = $this->createForm(TrainingType::class , $training);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'La formation a bien été modifiée.');

            return $this->redirectToRoute('crud-trainings');
        }

        return $this->render('@App/admin/trainings/edit.html.twig', array(
            'training'  => $training,
            'form'      => $form
        ));
    }


    /**
     * @Route("admin/formations/supprimer/{id}", name="delete-training")
     * @param Training $training
     * @param Request $request
     * @internal param $id
     * @return RedirectResponse|Response
     */
    public function deleteAction(Training $training, Request $request)
    {
        if (null === $training->getId()) {
            throw new NotFoundHttpException('La formation d\'id ' . $training->getId() . 'n\'existe pas.');
        }

        // Creation of an empty form that will contain only the CSRF field to protect the deletion from this flaw
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->remove($training);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'La formation a bien été supprimée.');

            return $this->redirectToRoute('crud-trainings');
        }

        return $this->render('@App/admin/trainings/delete.html.twig', array(
            'training' => $training,
            'form' => $form->createView(),
        ));
    }
}