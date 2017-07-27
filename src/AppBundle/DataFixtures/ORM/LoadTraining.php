<?php

# Fixture pour les tests.

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Training;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTraining extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $training1  = new Training();
        $training1->setName('Baccalauréat général, série Littéraire');
        $training1->setType('Diplôme');
        $training1->setInstitution('Lycée Jean-Pierre Vernant');
        $training1->setCity('Pins-Justaret');
        $begin_at = new \DateTime();
        $begin_at->setDate(2009, 9, 02);
        $training1->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2010, 7, 02);
        $training1->setEndAt($end_at);
        $training1->setMention('P');
        $training1->setDepartment($this->getReference('dep31'));

        $training2  = new Training();
        $training2->setName('Licence Langues, Littérature et Civilisation Etrangère');
        $training2->setType('Formation');
        $training2->setInstitution('Université Toulouse 2 Le Mirail');
        $training2->setCity('Toulouse');
        $begin_at = new \DateTime();
        $begin_at->setDate(2010, 10, 17);
        $training2->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2011, 5, 27);
        $training2->setEndAt($end_at);
        $training2->setMention('P');
        $training2->setImagePath('logoMirail.png');
        $training2->setDepartment($this->getReference('dep31'));

        $training3  = new Training();
        $training3->setName('Licence d\'Histoire');
        $training3->setType('Diplôme');
        $training3->setInstitution('Université Toulouse 2 Le Mirail');
        $training3->setCity('Toulouse');
        $begin_at = new \DateTime();
        $begin_at->setDate(2011, 9, 26);
        $training3->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2014, 5, 30);
        $training3->setEndAt($end_at);
        $training3->setMention('P');
        $training3->setImagePath('logoMirail.png');
        $training3->setDepartment($this->getReference('dep31'));

        $training4  = new Training();
        $training4->setName('Licence professionnelle Image et Histoire');
        $training4->setType('Diplôme');
        $training4->setInstitution('Université Toulouse 2 Jean Jaurès');
        $training4->setCity('Pins-Justaret');
        $begin_at = new \DateTime();
        $begin_at->setDate(2014, 9, 15);
        $training4->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2015, 5, 29);
        $training4->setEndAt($end_at);
        $training4->setMention('AB');
        $training4->setImagePath('logoUT2J.png');
        $training4->setDepartment($this->getReference('dep31'));

        $training5  = new Training();
        $training5->setName('Maîtrise d\'Information-Documentation');
        $training5->setType('Diplôme');
        $training5->setInstitution('Université Toulouse 2 Jean Jaurès');
        $training5->setCity('Toulouse');
        $begin_at = new \DateTime();
        $begin_at->setDate(2015, 9, 7);
        $training5->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2016, 6, 10);
        $training5->setEndAt($end_at);
        $training5->setMention('AB');
        $training5->setImagePath('logoUT2J.png');
        $training5->setDepartment($this->getReference('dep31'));

        $training6 = new Training();
        $training6->setName('Master 2 Ingénierie de l\'Information Numérique, I2N');
        $training6->setType('Formation');
        $training6->setInstitution('Université Toulouse 2 Jean Jaurès');
        $training6->setCity('Toulouse');
        $begin_at = new \DateTime();
        $begin_at->setDate(2016, 9, 5);
        $training6->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2017, 9, 29);
        $training6->setEndAt($end_at);
        $training6->setMention('P');
        $training6->setImagePath('logoUT2J.png');
        $training6->setDepartment($this->getReference('dep31'));

        $manager->persist($training1);
        $manager->persist($training2);
        $manager->persist($training3);
        $manager->persist($training4);
        $manager->persist($training5);
        $manager->persist($training6);

        $this->addReference('bac', $training1);
        $this->addReference('llcer', $training2);
        $this->addReference('histoire', $training3);
        $this->addReference('lp', $training4);
        $this->addReference('m1', $training5);
        $this->addReference('m2', $training6);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}