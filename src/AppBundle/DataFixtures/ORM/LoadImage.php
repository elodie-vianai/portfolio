<?php
# Fixture pour les tests.Y-

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Image;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadImage extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
//        $image1 = new Image();
//        $image1->setFile('C:\wamp64\www\portfolio-v3\web\images\logos\companies\logoComputys.png');
//        $image1->setUrl('logoComputys.png');
//        $image1->setAlt('Logo de Computys');
//        $this->addReference('Computys-image', $image1);

//        $image2 = new Image();
//        $image2->setUrl('logoFlunch.jpg');
//        $image2->setAlt('Logo de Flunch');
//        $this->addReference('Flunch-image', $image2);
//
//        $image3 = new Image();
//        $image3->setUrl('logoMNS.png');
//        $image3->setAlt('Logo du Musée National du Sport');
//        $this->addReference('MNS-image', $image3);
//
//        $image4 = new Image();
//        $image4->setUrl('logoSPNS.png');
//        $image4->setAlt('Logo du Saverdun Pyrénées Natation Sauvetage');
//        $this->addReference('SPNS-image', $image4);
//
//        $image5 = new Image();
//        $image5->setUrl('logoWA-all.png');
//        $image5->setAlt('Logo de Web-atrio');
//        $this->addReference('WebAtrio-image', $image5);
//
//        $image6 = new Image();
//        $image6->setUrl('logoMirail.png');
//        $image6->setAlt('Logo de l\'Université Toulouse 2 Le Mirail');
//        $this->addReference('Mirail', $image6);
//
//        $image7 = new Image();
//        $image7->setUrl('logoUT2J.png');
//        $image7->setAlt('Logo de l\'Université Toulouse 2 Jean Jaurès');
//        $this->addReference('UT2J', $image7);
//
//        $image9 = new Image();
//        $image9->setUrl('Bootstrap3.png');
//        $image9->setAlt('Framework Bootstrap 3');
//        $this->addReference('bootstrap3-image', $image9);
//
//        $image10 = new Image();
//        $image10->setUrl('Bootstrap4.png');
//        $image10->setAlt('Framework Bootstrap 4');
//        $this->addReference('bootstrap4-image', $image10);
//
//        $image11 = new Image();
//        $image11->setUrl('Brackets.jpg');
//        $image11->setAlt('Editeur Brackets');
//        $this->addReference('brackets-image', $image11);
//
//        $image12 = new Image();
//        $image12->setUrl('Chrome.jpg');
//        $image12->setAlt('Navigateur Chrome');
//        $this->addReference('chrome-image', $image12);
//
//        $image13 = new Image();
//        $image13->setUrl('CSS.png');
//        $image13->setAlt('CSS');
//        $this->addReference('css-image', $image13);
//
//        $image14 = new Image();
//        $image14->setUrl('Espagnol.jpg');
//        $image14->setAlt('Espagnol');
//        $this->addReference('espagnol-image', $image14);
//
//        $image15 = new Image();
//        $image15->setUrl('FileZilla.png');
//        $image15->setAlt('FTP FileZilla');
//        $this->addReference('filezilla-image', $image15);
//
//        $image16 = new Image();
//        $image16->setUrl('Git.png');
//        $image16->setAlt('Versionning Git');
//        $this->addReference('git-image', $image16);
//
//        $image17 = new Image();
//        $image17->setUrl('Google-docs.jpg');
//        $image17->setAlt('Google Docs');
//        $this->addReference('googledocs-image', $image17);
//
//        $image18= new Image();
//        $image18->setUrl('HTML.png');
//        $image18->setAlt('HTML');
//        $this->addReference('html-image', $image18);
//
//        $image19= new Image();
//        $image19->setUrl('Illustrator.png');
//        $image19->setAlt('Adobe Illustrator');
//        $this->addReference('illustrator-image', $image19);
//
//        $image20= new Image();
//        $image20->setUrl('Javascript.png');
//        $image20->setAlt('JavaScript');
//        $this->addReference('javascript-image', $image20);
//
//        $image21= new Image();
//        $image21->setUrl('Mozilla.jpg');
//        $image21->setAlt('Navigateur Mozilla Firefox');
//        $this->addReference('mozilla-image', $image21);
//
//        $image22= new Image();
//        $image22->setUrl('MS-Office.png');
//        $image22->setAlt('Suite Microsft Office');
//        $this->addReference('msoffice-image', $image22);
//
//        $image23= new Image();
//        $image23->setUrl('MYSQL.png');
//        $image23->setAlt('MySQL');
//        $this->addReference('mysql-image', $image23);
//
//        $image24= new Image();
//        $image24->setUrl('MYSQL-Workbench.png');
//        $image24->setAlt('MySQL-Workbench');
//        $this->addReference('mysqlworkbench-image', $image24);
//
//        $image25= new Image();
//        $image25->setUrl('Occitan.png');
//        $image25->setAlt('Occitan');
//        $this->addReference('occitan-image', $image25);
//
//        $image26= new Image();
//        $image26->setUrl('Open-Office.jpg');
//        $image26->setAlt('Suite Open Office');
//        $this->addReference('openoffice-image', $image26);
//
//        $image27= new Image();
//        $image27->setUrl('Photoshop.png');
//        $image27->setAlt('Adobe Photoshop');
//        $this->addReference('photoshop-image', $image27);
//
//        $image28= new Image();
//        $image28->setUrl('PhpMyAdmin.png');
//        $image28->setAlt('PhpMyAdmin');
//        $this->addReference('phpmyadmin-image', $image28);
//
//        $image29= new Image();
//        $image29->setUrl('PHPOld.png');
//        $image29->setAlt('PHP procrédural');
//        $this->addReference('phpold-image', $image29);
//
//        $image30= new Image();
//        $image30->setUrl('PHPpoo.png');
//        $image30->setAlt('PHP objet');
//        $this->addReference('phpoo-image', $image30);
//
//        $image31= new Image();
//        $image31->setUrl('PhpStorm.png');
//        $image31->setAlt('IDE PhpStorm');
//        $this->addReference('phpstorm-image', $image31);
//
//        $image32= new Image();
//        $image32->setUrl('Safari.jpg');
//        $image32->setAlt('Navigateur Safari');
//        $this->addReference('safari-image', $image32);
//
//        $image33= new Image();
//        $image33->setUrl('Skype.jpg');
//        $image33->setAlt('Skype');
//        $this->addReference('skype-image', $image33);
//
//        $image34= new Image();
//        $image34->setUrl('Slim.png');
//        $image34->setAlt('Framework Slim');
//        $this->addReference('slim-image', $image34);
//
//        $image35= new Image();
//        $image35->setUrl('SublimText.jpg');
//        $image35->setAlt('Editeur Sublim Text');
//        $this->addReference('sublimtext-image', $image35);
//
//        $image36= new Image();
//        $image36->setUrl('Symfony.png');
//        $image36->setAlt('Framework Symfony');
//        $this->addReference('symfony-image', $image36);
//
//        $image37= new Image();
//        $image37->setUrl('Twig.jpg');
//        $image37->setAlt('Générateur de templates Twig');
//        $this->addReference('twig-image', $image37);
//
//        $image38= new Image();
//        $image38->setUrl('WampServer.png');
//        $image38->setAlt('WampServer');
//        $this->addReference('wampserver-image', $image38);
//
//        $image39= new Image();
//        $image39->setUrl('Windows.png');
//        $image39->setAlt('Système d\'exploitation Windows');
//        $this->addReference('windows-image', $image39);
//
//        $image40 = new Image();
//        $image40->setUrl('EnModeSport.jpg');
//        $image40->setAlt('Exposition En Mode Sport');
//        $this->addReference('EnModeSport-image', $image40);
//
//        $image41 = new Image();
//        $image41->setUrl('Portfolio.png');
//        $image41->setAlt('Portfolio');
//        $this->addReference('portfolio-image', $image41);
//
//        $image42 = new Image();
//        $image42->setUrl('siteSPNS.png');
//        $image42->setAlt('Site du SPNS');
//        $this->addReference('siteSpns-image', $image42);
//
//        $image43 = new Image();
//        $image43->setUrl('GitHub.png');
//        $image43->setAlt('GitHub');
//        $this->addReference('github-image', $image43);
//
//        $image43 = new Image();
//        $image43->setUrl('Anglais.jpg');
//        $image43->setAlt('Anglais');
//        $this->addReference('anglais-image', $image43);




//        $manager->persist($image1);
//        $manager->persist($image2);
//        $manager->persist($image3);
//        $manager->persist($image4);
//        $manager->persist($image5);
//        $manager->persist($image6);
//        $manager->persist($image7);
//        $manager->persist($image9);
//        $manager->persist($image10);
//        $manager->persist($image11);
//        $manager->persist($image12);
//        $manager->persist($image13);
//        $manager->persist($image14);
//        $manager->persist($image15);
//        $manager->persist($image16);
//        $manager->persist($image17);
//        $manager->persist($image18);
//        $manager->persist($image19);
//        $manager->persist($image20);
//        $manager->persist($image21);
//        $manager->persist($image22);
//        $manager->persist($image23);
//        $manager->persist($image24);
//        $manager->persist($image25);
//        $manager->persist($image26);
//        $manager->persist($image27);
//        $manager->persist($image28);
//        $manager->persist($image29);
//        $manager->persist($image30);
//        $manager->persist($image31);
//        $manager->persist($image32);
//        $manager->persist($image33);
//        $manager->persist($image34);
//        $manager->persist($image35);
//        $manager->persist($image36);
//        $manager->persist($image37);
//        $manager->persist($image38);
//        $manager->persist($image39);
//        $manager->persist($image40);
//        $manager->persist($image41);
//        $manager->persist($image42);
//        $manager->persist($image43);

    }

    public function getOrder()
    {
        return 2;
    }
}