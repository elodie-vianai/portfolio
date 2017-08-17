<?php

# Fixture pour les tests.

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Experience;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadExperience extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $experience1 = new Experience();
        $experience1->setName('Employée polyvalente de restauration');
        $experience1->setContract('CDI');
        $experience1->setCompany('Flunch');
        $experience1->setCity('Portet-sur-Garonne');
        $begin_at = new \DateTime();
        $begin_at->setDate(2013, 10, 18);
        $experience1->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2017, 1, 1);
        $experience1->setEndAt($end_at);
        $experience1->setImage($this->getReference('Flunch-image'));
        $experience1->setDepartment($this->getReference('dep31'));

        $experience2 = new Experience();
        $experience2->setName('Documentaliste stagiaire');
        $experience2->setContract('Stage');
        $experience2->setCompany('Musée National du Sport');
        $experience2->setCity('Nice');
        $begin_at = new \DateTime();
        $begin_at->setDate(2015, 2, 15);
        $experience2->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2015, 6, 19);
        $experience2->setEndAt($end_at);
        $experience2->setImage($this->getReference('MNS-image'));
        $experience2->setDepartment($this->getReference('dep06'));

        $experience3 = new Experience();
        $experience3->setName('Développeuse web stagiaire');
        $experience3->setContract('Stage');
        $experience3->setCompany('Computys');
        $experience3->setCity('Colomiers');
        $begin_at = new \DateTime();
        $begin_at->setDate(2015, 10, 19);
        $experience3->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2015, 12, 18);
        $experience3->setEndAt($end_at);
        $experience3->setImage($this->getReference('Computys-image'));
        $experience3->setDepartment($this->getReference('dep31'));

        $experience4 = new Experience();
        $experience4->setName('Développeuse web stagiaire');
        $experience4->setContract('Stage');
        $experience4->setCompany('Web-atrio');
        $experience4->setCity('Blagnac');
        $begin_at = new \DateTime();
        $begin_at->setDate(2017, 3, 27);
        $experience4->setBeginAt($begin_at);
        $end_at = new \DateTime();
        $end_at->setDate(2017, 9, 30);
        $experience4->setEndAt($end_at);
        $experience4->setImage($this->getReference('WebAtrio-image'));
        $experience4->setDepartment($this->getReference('dep31'));

        $manager->persist($experience1);
        $manager->persist($experience2);
        $manager->persist($experience3);
        $manager->persist($experience4);

        $this->addReference('Flunch', $experience1);
        $this->addReference('MNS', $experience2);
        $this->addReference('Computys', $experience3);
        $this->addReference('WA', $experience4);

        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }

}