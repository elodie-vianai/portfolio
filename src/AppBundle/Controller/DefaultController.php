<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @return Response
     */
    public function indexAction()
    {
        // Get the repository and the entity manager
        $em =   $this->getDoctrine()->getManager();

        // Get the 5 last projects
        $projects   = $em->getRepository('AppBundle:Project')
            ->findBy(
                array(),                            // no criteria
                array('year' => 'desc'),            // sort by decreasing date
                5,                             // selection of 5 projects maximum
                0                             // from the first element
            );
        $lastProject = $em->getRepository('AppBundle:Project')
            ->findBy(
                array(),
                array('year' => 'desc', 'id' => 'desc'),
                1,
                0
            );


        $spotify_token = $this->get('session')->get('spotify_token');

        $playlists = '';
        if (isset($spotify_token)) {
            $playlists = $this->get('ev.api.spotify')->getSpotify();
        }

        //users
        $user = $this->getUser();

        return $this->render('AppBundle:home:default.html.twig', array(
            'projects'          =>  $projects,
            'lastProject'       =>  $lastProject,
            'user'              =>  $user,
            'playlists'         =>  $playlists
        ));
    }


    /**
     * @Route("/contact", name="contactPage")
     *
     * @return Response
     */
    public function contactAction()
    {
       return $this->render('AppBundle:home:contact.html.twig');
    }


    /**
     * @Route("/telecharger-un-cv", name="cv-pdf-generator")
     *
     * @return Response
     */
    public function CVonPDF(){

        return $this->render('@App/public/CVonPDF.html.twig');
    }


    /**
     * @Route("/telechargement-cv", name="downloadCV")
     */
    public function generateCvInPDFAction(){
        $em = $this->getDoctrine();

        $data = 'Hello world !';

        $html = $this->renderView(
            '@App/CV/cv.html.twig',
        [
            'data'  => $data,
        ]
        );

        return $this->get('ev.pdf.pdf_generator')->generate($html, 'cv_Elodie_Vianai.pdf');
    }
}
