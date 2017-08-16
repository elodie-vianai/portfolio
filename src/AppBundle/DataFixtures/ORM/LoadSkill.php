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
        $skill1->setImage($this->getReference('html-image'));
        $skill1->setLevel(4);
        $skill1->setCategory('Technologies');
        $manager->persist($skill1);
        $this->addReference('html', $skill1);

        $skill2 = new Skill();
        $skill2->setName('CSS 3');
        $skill2->setImage($this->getReference('css-image'));
        $skill2->setLevel(4);
        $skill2->setCategory('Technologies');
        $manager->persist($skill2);
        $this->addReference('css', $skill2);

        $skill3 = new Skill();
        $skill3->setName('JavaScript');
        $skill3->setImage($this->getReference('javascript-image'));
        $skill3->setLevel(1);
        $skill3->setCategory('Technologies');
        $manager->persist($skill3);
        $this->addReference('javascript', $skill3);

        $skill4 = new Skill();
        $skill4->setName('PHP procédural');
        $skill4->setImage($this->getReference('phpold-image'));
        $skill4->setLevel(2);
        $skill4->setCategory('Technologies');
        $manager->persist($skill4);
        $this->addReference('php', $skill4);

        $skill5 = new Skill();
        $skill5->setName('PHP objet');
        $skill5->setImage($this->getReference('phpoo-image'));
        $skill5->setLevel(2);
        $skill5->setCategory('Technologies');
        $manager->persist($skill5);
        $this->addReference('phpoo', $skill5);

        $skill6 = new Skill();
        $skill6->setName('Bootstrap 3');
        $skill6->setImage($this->getReference('bootstrap3-image'));
        $skill6->setLevel(3);
        $skill6->setCategory('Technologies');
        $manager->persist($skill6);
        $this->addReference('bootstrap3', $skill6);

        $skill7 = new Skill();
        $skill7->setName('Bootstrap 4');
        $skill7->setImage($this->getReference('bootstrap4-image'));
        $skill7->setLevel(3);
        $skill7->setCategory('Technologies');
        $manager->persist($skill7);
        $this->addReference('bootstrap4', $skill7);

        $skill8 = new Skill();
        $skill8->setName('Slim');
        $skill8->setImage($this->getReference('slim-image'));
        $skill8->setLevel(1);
        $skill8->setCategory('Technologies');
        $manager->persist($skill8);
        $this->addReference('slim', $skill8);

        $skill9 = new Skill();
        $skill9->setName('Twig');
        $skill9->setImage($this->getReference('twig-image'));
        $skill9->setLevel(4);
        $skill9->setCategory('Technologies');
        $manager->persist($skill9);
        $this->addReference('twig', $skill9);

        $skill10 = new Skill();
        $skill10->setName('Symfony 3');
        $skill10->setImage($this->getReference('symfony-image'));
        $skill10->setLevel(2);
        $skill10->setCategory('Technologies');
        $manager->persist($skill10);
        $this->addReference('symfony3', $skill10);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}