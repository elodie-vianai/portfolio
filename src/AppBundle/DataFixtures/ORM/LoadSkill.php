<?php

# Fixture pour les tests.

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Skill;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSkill extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $skill1 = new Skill();
        $skill1->setName('HTML 5');
        $skill1->setImagePath('HTML.png');
        $skill1->setLevel(4);
        $skill1->setCategory('Technologies');
        $manager->persist($skill1);
        $this->addReference('HTML', $skill1);

        $skill2 = new Skill();
        $skill2->setName('CSS 3');
        $skill2->setImagePath('CSS.png');
        $skill2->setLevel(4);
        $skill2->setCategory('Technologies');
        $manager->persist($skill2);
        $this->addReference('CSS', $skill2);

        $skill3 = new Skill();
        $skill3->setName('JavaScript');
        $skill3->setImagePath('Javascript.png');
        $skill3->setLevel(1);
        $skill3->setCategory('Technologies');
        $manager->persist($skill3);
        $this->addReference('javascript', $skill3);

        $skill4 = new Skill();
        $skill4->setName('PHP procédural');
        $skill4->setImagePath('PHPOld.png');
        $skill4->setLevel(2);
        $skill4->setCategory('Technologies');
        $manager->persist($skill4);
        $this->addReference('php', $skill4);

        $skill5 = new Skill();
        $skill5->setName('PHP objet');
        $skill5->setImagePath('PHPpoo.png');
        $skill5->setLevel(2);
        $skill5->setCategory('Technologies');
        $manager->persist($skill5);
        $this->addReference('PHPpoo', $skill5);

        $skill6 = new Skill();
        $skill6->setName('Bootstrap 4');
        $skill6->setImagePath('Bootstrap.png');
        $skill6->setLevel(3);
        $skill6->setCategory('Technologies');
        $manager->persist($skill6);
        $this->addReference('Bootstrap', $skill6);

        $skill7 = new Skill();
        $skill7->setName('Slim');
        $skill7->setImagePath('Slim.png');
        $skill7->setLevel(1);
        $skill7->setCategory('Technologies');
        $manager->persist($skill7);
        $this->addReference('slim', $skill7);

        $skill8 = new Skill();
        $skill8->setName('Twig');
        $skill8->setImagePath('Twig.png');
        $skill8->setLevel(4);
        $skill8->setCategory('Technologies');
        $manager->persist($skill8);
        $this->addReference('twig', $skill8);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}