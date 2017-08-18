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
//        $skill1->setImage($this->getReference('html-image'));
        $skill1->setLevel(3);
        $skill1->setCategory('Technologies');

        $skill2 = new Skill();
        $skill2->setName('CSS 3');
//        $skill2->setImage($this->getReference('css-image'));
        $skill2->setLevel(3);
        $skill2->setCategory('Technologies');

        $skill3 = new Skill();
        $skill3->setName('JavaScript');
//        $skill3->setImage($this->getReference('javascript-image'));
        $skill3->setLevel(1);
        $skill3->setCategory('Technologies');

        $skill4 = new Skill();
        $skill4->setName('PHP procédural');
//        $skill4->setImage($this->getReference('phpold-image'));
        $skill4->setLevel(2);
        $skill4->setCategory('Technologies');

        $skill5 = new Skill();
        $skill5->setName('PHP objet');
//        $skill5->setImage($this->getReference('phpoo-image'));
        $skill5->setLevel(2);
        $skill5->setCategory('Technologies');

        $skill6 = new Skill();
        $skill6->setName('Bootstrap 3');
//        $skill6->setImage($this->getReference('bootstrap3-image'));
        $skill6->setLevel(3);
        $skill6->setCategory('Technologies');

        $skill7 = new Skill();
        $skill7->setName('Bootstrap 4');
//        $skill7->setImage($this->getReference('bootstrap4-image'));
        $skill7->setLevel(3);
        $skill7->setCategory('Technologies');

        $skill8 = new Skill();
        $skill8->setName('Slim');
//        $skill8->setImage($this->getReference('slim-image'));
        $skill8->setLevel(1);
        $skill8->setCategory('Technologies');

        $skill9 = new Skill();
        $skill9->setName('Twig');
//        $skill9->setImage($this->getReference('twig-image'));
        $skill9->setLevel(4);
        $skill9->setCategory('Technologies');

        $skill10 = new Skill();
        $skill10->setName('Symfony 3');
//        $skill10->setImage($this->getReference('symfony-image'));
        $skill10->setLevel(2);
        $skill10->setCategory('Technologies');

        $skill11 = new Skill();
        $skill11->setName('Anglais');
//        $skill11->setImage($this->getReference('anglais-image'));
        $skill11->setLevel(2);
        $skill11->setCategory('Langues');

        $skill12 = new Skill();
        $skill12->setName('Brackets');
//        $skill12->setImage($this->getReference('brackets-image'));
        $skill12->setLevel(4);
        $skill12->setCategory('Logiciels');

        $skill13 = new Skill();
        $skill13->setName('Chrome');
//        $skill13->setImage($this->getReference('chrome-image'));
        $skill13->setLevel(4);
        $skill13->setCategory('Navigateurs');

        $skill14 = new Skill();
        $skill14->setName('Espagnol');
//        $skill14->setImage($this->getReference('espagnol-image'));
        $skill14->setLevel(1);
        $skill14->setCategory('Langues');

        $skill15 = new Skill();
        $skill15->setName('FileZilla');
//        $skill15->setImage($this->getReference('filezilla-image'));
        $skill15->setLevel(1);
        $skill15->setCategory('Logiciels');

        $skill16 = new Skill();
        $skill16->setName('GitHub');
//        $skill16->setImage($this->getReference('github-image'));
        $skill16->setLevel(3);
        $skill16->setCategory('Logiciels');

        $skill17 = new Skill();
        $skill17->setName('Git');
//        $skill17->setImage($this->getReference('gi-image'));
        $skill17->setLevel(1);
        $skill17->setCategory('Logiciels');

        $skill18 = new Skill();
        $skill18->setName('Google Documents');
//        $skill18->setImage($this->getReference('googledocs-image'));
        $skill18->setLevel(4);
        $skill18->setCategory('Bureautique');

        $skill19 = new Skill();
        $skill19->setName('Adobe Illustrator');
//        $skill19->setImage($this->getReference('illustrator-image'));
        $skill19->setLevel(2);
        $skill19->setCategory('Graphisme');

        $skill20 = new Skill();
        $skill20->setName('Mozilla Firefox');
//        $skill20->setImage($this->getReference('mozilla-image'));
        $skill20->setLevel(3);
        $skill20->setCategory('Navigateurs');

        $skill21 = new Skill();
        $skill21->setName('Suite Microsoft Office');
//        $skill21->setImage($this->getReference('msoffice-image'));
        $skill21->setLevel(5);
        $skill21->setCategory('Bureautique');

        $skill22 = new Skill();
        $skill22->setName('MySQL');
//        $skill22->setImage($this->getReference('mysql-image'));
        $skill22->setLevel(2);
        $skill22->setCategory('Technologies');

        $skill23 = new Skill();
        $skill23->setName('MySQL Workbench');
//        $skill23->setImage($this->getReference('mysqlworkbench-image'));
        $skill23->setLevel(2);
        $skill23->setCategory('Logiciels');

        $skill24 = new Skill();
        $skill24->setName('Occitan');
//        $skill24->setImage($this->getReference('occitan-image'));
        $skill24->setLevel(4);
        $skill24->setCategory('Langues');

        $skill25 = new Skill();
        $skill25->setName('Suite Open Office');
//        $skill25->setImage($this->getReference('openoffice-image'));
        $skill25->setLevel(4);
        $skill25->setCategory('Bureautique');

        $skill26 = new Skill();
        $skill26->setName('Adobe Photoshop');
//        $skill26->setImage($this->getReference('photoshop-image'));
        $skill26->setLevel(3);
        $skill26->setCategory('Graphisme');

        $skill27 = new Skill();
        $skill27->setName('PhpMyAdmin');
//        $skill27->setImage($this->getReference('phpmyadmin-image'));
        $skill27->setLevel(3);
        $skill27->setCategory('Database');

        $skill28 = new Skill();
        $skill28->setName('PhpStorm');
//        $skill28->setImage($this->getReference('phpstorm-image'));
        $skill28->setLevel(3);
        $skill28->setCategory('Logiciels');

        $skill29 = new Skill();
        $skill29->setName('Safari');
//        $skill29->setImage($this->getReference('safari-image'));
        $skill29->setLevel(2);
        $skill29->setCategory('Navigateurs');

        $skill30 = new Skill();
        $skill30->setName('Skype');
//        $skill30->setImage($this->getReference('skype-image'));
        $skill30->setLevel(4);
        $skill30->setCategory('Professionnel');

        $skill31 = new Skill();
        $skill31->setName('SublimText');
//        $skill31->setImage($this->getReference('sublimtext-image'));
        $skill31->setLevel(4);
        $skill31->setCategory('Logiciels');

        $skill32 = new Skill();
        $skill32->setName('WampServer');
//        $skill32->setImage($this->getReference('wampserver-image'));
        $skill32->setLevel(2);
        $skill32->setCategory('Serveur');

        $skill33 = new Skill();
        $skill33->setName('Windows');
//        $skill33->setImage($this->getReference('windows-image'));
        $skill33->setLevel(2);
        $skill33->setCategory('OS');

        $manager->persist($skill1);
        $manager->persist($skill2);
        $manager->persist($skill3);
        $manager->persist($skill4);
        $manager->persist($skill5);
        $manager->persist($skill6);
        $manager->persist($skill7);
        $manager->persist($skill8);
        $manager->persist($skill9);
        $manager->persist($skill10);
        $manager->persist($skill11);
        $manager->persist($skill12);
        $manager->persist($skill13);
        $manager->persist($skill14);
        $manager->persist($skill15);
        $manager->persist($skill16);
        $manager->persist($skill17);
        $manager->persist($skill18);
        $manager->persist($skill19);
        $manager->persist($skill20);
        $manager->persist($skill21);
        $manager->persist($skill22);
        $manager->persist($skill23);
        $manager->persist($skill24);
        $manager->persist($skill25);
        $manager->persist($skill26);
        $manager->persist($skill27);
        $manager->persist($skill28);
        $manager->persist($skill29);
        $manager->persist($skill30);
        $manager->persist($skill31);
        $manager->persist($skill32);
        $manager->persist($skill33);

        $this->addReference('html', $skill1);
        $this->addReference('css', $skill2);
        $this->addReference('javascript', $skill3);
        $this->addReference('php', $skill4);
        $this->addReference('phpoo', $skill5);
        $this->addReference('bootstrap3', $skill6);
        $this->addReference('bootstrap4', $skill7);
        $this->addReference('slim', $skill8);
        $this->addReference('twig', $skill9);
        $this->addReference('symfony3', $skill10);


        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}