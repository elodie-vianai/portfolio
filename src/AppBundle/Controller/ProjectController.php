<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectController extends Controller
{
    /**
     * @Route ("/detail-projet/{id}", name="projectDetail")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction($id)
    {
        $project = $this->getDoctrine()->getManager()->getRepository('AppBundle:Project')
            ->find($id);

        return $this->render('AppBundle:public:projectDetail.html.twig', array(
            'project' => $project,
        ));
    }


    /**
     * @Route("/admin/projets", name="crud-projects")
     * @return Response
     */
    public function crudAction()
    {
        $projects = $this->getDoctrine()->getManager()->getRepository('AppBundle:Project')
            ->findBy(
                array(),
                array('year' => 'desc'),
                null,
                0
            );

        return $this->render('AppBundle:admin/projects:crud.html.twig', array(
            'projects' => $projects
        ));
    }


    /**
     * @Route("/admin/projets/ajouter", name="add-project")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $project = new Project();

        $form = $this->createForm(ProjectType::class, $project);

        // If the request is in POST and the values are validated by the Validator
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Record of the object $training into the database
            $this->getDoctrine()->getManager()->persist($project);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'Projet bien enregistré !');

            return $this->redirectToRoute('crud-projects');
        }

        return $this->render('@App/admin/projects/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("admin/projets/modifier/{id})", name="edit-projects")
     * @param Project $project
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editAction(Project $project, Request $request)
    {
        if (null === $project){
            throw new NotFoundHttpException('Le projet demandé n\'existe pas.');
        }

        $form = $this->createForm(ProjectType::class , $project);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'Le projet a bien été modifié.');

            return $this->redirectToRoute('crud-projects');
        }

        return $this->render('@App/admin/projects/edit.html.twig', array(
            'project'  => $project,
            'form'      => $form
        ));
    }


    /**
     * @Route("admin/projets/supprimer/{id}", name="delete-project")
     * @param Project $project
     * @param Request $request
     * @internal param $id
     * @return RedirectResponse|Response
     */
    public function deleteAction(Project $project, Request $request)
    {
        if (null === $project->getId()) {
            throw new NotFoundHttpException('Le projet d\'id ' . $project->getId() . 'n\'existe pas.');
        }

        // Creation of an empty form that will contain only the CSRF field to protect the deletion from this flaw
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->remove($project);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'Le projet a bien été supprimée.');

            return $this->redirectToRoute('crud-projects');
        }

        return $this->render('@App/admin/projects/delete.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }
}