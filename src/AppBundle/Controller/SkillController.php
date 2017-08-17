<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use AppBundle\Form\SkillType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SkillController extends Controller
{
    /**
     * @Route ("/competences", name="skills")
     */
    public function skillsAction()
    {
        $skills = $this->getDoctrine()->getManager()->getRepository('AppBundle:Skill')->findAll();

        return $this->render('AppBundle:public:skills.html.twig', array(
            'skills' => $skills,
        ));
    }


    /**
     * @Route("/admin/competences", name="crud-skills")
     * @return Response
     */
    public function crudAction()
    {
        $skills = $this->getDoctrine()->getManager()->getRepository('AppBundle:Skill')->findBy(
            array(),
            array('name' => 'asc'),
            null,
            0
        );

        return $this->render('@App/admin/skills/crud.html.twig', array(
            'skills' => $skills,
        ));
    }


    /**
     * @Route("/admin/competences/ajouter", name="add-skill")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $skill = new Skill();

        $form = $this->createForm(SkillType::class, $skill);

        // If the request is in POST and the values are validated by the Validator
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Record of the object $training into the database
            $this->getDoctrine()->getManager()->persist($skill);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'Compétence bien enregistrée !');

            return $this->redirectToRoute('crud-skills');
        }

        return $this->render('@App/admin/skills/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("admin/competences/modifier/{id})", name="edit-skill")
     * @param Skill $skill
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editAction(Skill $skill, Request $request)
    {
        if (null === $skill) {
            throw new NotFoundHttpException('La compétence demandée n\'existe pas.');
        }

        $form = $this->createForm(SkillType::class, $skill);

        $form->handleRequest($request);
        if ($request->isMethod('POST') && $form->isValid()){
            $skill->getImage()->preUpload();

            $this->getDoctrine()->getManager()->persist($skill);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'La compétence a bien été modifiée.');

            return $this->redirectToRoute('crud-skills');
        }

        return $this->render('@App/admin/skills/edit.html.twig', array(
            'skill' => $skill,
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("admin/competences/supprimer/{id}", name="delete-skill")
     * @param Skill $skill
     * @param Request $request
     * @internal param $id
     * @return RedirectResponse|Response
     */
    public function deleteAction(Skill $skill, Request $request)
    {
        if (null === $skill->getId()) {
            throw new NotFoundHttpException('La compétence d\'id ' . $skill->getId() . 'n\'existe pas.');
        }

        // Creation of an empty form that will contain only the CSRF field to protect the deletion from this flaw
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->remove($skill);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', 'La compétence a bien été supprimée.');

            return $this->redirectToRoute('crud-skills');
        }

        return $this->render('@App/admin/skills/delete.html.twig', array(
            'skill' => $skill,
            'form' => $form->createView(),
        ));
    }
}