<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadProject
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadProject extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $projects = [
        [
            'name'          =>  'Exposition "En Mode Sport"',
            'description'   =>  'Participation à l\'élaboration du catalogue et de l\'exposition En Mode Sport (été 2015).',
            'year'          =>  '2015',
            'experience'    =>  'MNS',
            'image'         =>  'EnModeSport.jpg',
            'ref'           =>  'ems',
        ],
        [
            'name'          =>  'Les Voyages de Petit Louis, version 1',
            'description'   =>  'Application permettant la gestion des archives de Louis Bernard Emont, alias Petit Louis, 
                télégraphiste pour l\'aéropostale dans les années 30.',
            'year'          =>  '2016',
            'experience'    =>  'Computys',
            'skills'         =>  [
                'php',
                'css',
                'html',
                'bootstrap3',
            ],
            'ref'           =>  'pl',
        ],
        [
            'name'          =>  'Portfolio',
            'description'   =>  'Mon portfolio de développeuse pour présenter mes formations, mes expériences, mes projets et mes compétences. 
                Sera présenté lors de ma soutenance de fin d\'études.',
            'year'          =>  '2017',
            'experience'    =>  'WA',
            'image'         =>  'Portfolio.png',
            'skills'        =>  [
                'css',
                'html',
                'bootstrap4',
                'phpoo',
                'symfony3',
                'twig',
            ],
            'ref'           =>  'portfolio',
        ],
    ];


    /**
     * Set projects
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->projects as $item){
            $project = new Project();

            $project->setName($item['name']);
            $project->setDescription($item['description']);
            $project->setYear($item['year']);
            $project->setExperience($this->getReference($item['experience']));

            if (isset($item['image'])) {
                $project->setImage($item['image']);
            }

            if (isset($item['skills'])) {
                foreach ($item['skills'] as $skill){
                    $project->addSkill($this->getReference($skill));
                }
            }

            $manager->persist($project);

            $this->setReference($item['ref'], $project);
        }

        $manager->flush();
    }


    /**
     * @return int
     */
    public function getOrder()
    {
        return 6;
    }

}