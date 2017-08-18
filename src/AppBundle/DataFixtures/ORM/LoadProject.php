<?php

# Fixture pour les tests.

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadProject extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project1 = new Project();
        $project1->setName('Exposition "En Mode Sport"');
        $project1->setDescription('Participation à l\'élaboration du catalogue et de l\'exposition En Mode Sport (été 2015).');
        $project1->setYear(2015);
//        $project1->setImage($this->getReference('EnModeSport-image'));
        $project1->setExperience($this->getReference('MNS'));

        $project2 = new Project();
        $project2->setName('Les Voyages de Petit Louis, version 1');
        $project2->setDescription('Application permettant la gestion des archives de Louis Bernard Emont, alias Petit Louis, 
            télégraphiste pour l\'aéropostale dans les années 30.');
        $project2->setYear(2016);
        $project2->setExperience($this->getReference('Computys'));
        $project2->addSkill($this->getReference('php'));
        $project2->addSkill($this->getReference('css'));
        $project2->addSkill($this->getReference('html'));
        $project2->addSkill($this->getReference('bootstrap3'));
        $project2->addSkill($this->getReference('javascript'));

        $project3 = new Project();
        $project3->setName('Portfolio v1');
        $project3->setDescription('Première version de mon application de présentation de mon portfolio de développeuse.');
        $project3->setYear(2017);
//        $project3->setImage($this->getReference('portfolio-image'));
        $project3->setExperience($this->getReference('WA'));;
        $project3->addSkill($this->getReference('css'));
        $project3->addSkill($this->getReference('html'));
        $project3->addSkill($this->getReference('bootstrap3'));
        $project3->addSkill($this->getReference('phpoo'));
        $project3->addSkill($this->getReference('slim'));
        $project3->addSkill($this->getReference('twig'));

        $project4 = new Project();
        $project4->setName('Portfolio v2');
        $project4->setDescription('Deuxième version de mon application de présentation de mon portfolio de développeuse.');
        $project4->setYear(2017);
//        $project4->setImage($this->getReference('portfolio-image'));
        $project4->setExperience($this->getReference('WA'));
        $project4->addSkill($this->getReference('css'));
        $project4->addSkill($this->getReference('html'));
        $project4->addSkill($this->getReference('bootstrap4'));
        $project4->addSkill($this->getReference('phpoo'));
        $project4->addSkill($this->getReference('slim'));
        $project4->addSkill($this->getReference('twig'));

        $project5 = new Project();
        $project5->setName('Portfolio v3');
        $project5->setDescription('Troisième version de mon application de présentation de mon portfolio de développeuse. Sera présenté lors
            de ma soutenance de stage.');
        $project5->setYear(2017);
//        $project5->setImage($this->getReference('portfolio-image'));
        $project5->setExperience($this->getReference('WA'));
        $project5->addSkill($this->getReference('css'));
        $project5->addSkill($this->getReference('html'));
        $project5->addSkill($this->getReference('bootstrap4'));
        $project5->addSkill($this->getReference('phpoo'));
        $project5->addSkill($this->getReference('symfony3'));
        $project5->addSkill($this->getReference('twig'));

        $manager->persist($project1);
        $manager->persist($project2);
        $manager->persist($project3);
        $manager->persist($project4);
        $manager->persist($project5);

        $this->addReference('EnModeSport', $project1);
        $this->addReference('PetitLouis', $project2);
        $this->addReference('P1', $project3);
        $this->addReference('P2', $project4);
        $this->addReference('P3', $project5);

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }

}