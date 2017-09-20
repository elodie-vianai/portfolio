<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Skill;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadSkill
 * Load data fixtures
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadSkill extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $skills = [
        [
            'name'      => 'Adobe Illustrator',
            'level'     =>  2,
            'type'      =>  'Graphisme',
            'image'     =>  'Illustrator.png',
        ],
        [
            'name'      => 'Adobe Photoshop',
            'level'     =>  3,
            'type'      =>  'Graphisme',
            'image'     =>  'Photoshop.png',
        ],
        [
            'name'      => 'Anglais',
            'level'     =>  2,
            'type'      =>  'Langues',
            'image'     =>  'Anglais.jpg',
        ],
        [
            'name'      => 'Brackets',
            'level'     =>  4,
            'type'      =>  'Logiciels',
            'image'     =>  'Brackets.jpg',
        ],
        [
            'name'      => 'Bootstrap 3',
            'level'     =>  3,
            'type'      =>  'Technologies',
            'image'     =>  'Bootstrap3.png',
            'reference' =>  'bootstrap3',
        ],
        [
            'name'      => 'Bootstrap 4',
            'level'     =>  3,
            'type'      =>  'Technologies',
            'image'     =>  'Bootstrap4.png',
            'reference' =>  'bootstrap4',
        ],
        [
            'name'      => 'CSS 3',
            'level'     =>  3,
            'type'      =>  'Technologies',
            'image'     =>  'CSS.png',
            'reference' =>  'css',
        ],
        [
            'name'      => 'Espagnol',
            'level'     =>  1,
            'type'      =>  'Langues',
            'image'     =>  'Espagnol.jpg',
        ],
        [
            'name'      => 'FileZilla',
            'level'     =>  1,
            'type'      =>  'Logiciels',
            'image'     =>  'FileZilla.png',
        ],
        [
            'name'      => 'Git',
            'level'     =>  1,
            'type'      =>  'Logiciels',
            'image'     =>  'Git.png',
        ],
        [
            'name'      => 'GitHub',
            'level'     =>  3,
            'type'      =>  'Logiciels',
            'image'     =>  'GitHub.png',
        ],
        [
            'name'      => 'Google Chrome',
            'level'     =>  4,
            'type'      =>  'Navigateurs',
            'image'     =>  'Chrome.jpg',
        ],
        [
            'name'      => 'Google Documents',
            'level'     =>  4,
            'type'      =>  'Bureautique',
            'image'     =>  'Google-docs.jpg',
        ],
        [
            'name'      => 'HTML 5',
            'level'     =>  3,
            'type'      =>  'Technologies',
            'reference' =>  'html',
            'image'     =>  'HTML.png',
        ],
        [
            'name'      => 'JavaScript',
            'level'     =>  1   ,
            'type'      =>  'Technologies',
            'image'     =>  'Javascript.png',
            'reference' =>  'javascript',
        ],
        [
            'name'      => 'Microsoft Office',
            'level'     =>  5,
            'type'      =>  'Bureautique',
            'image'     =>  'MS-Office.png',
        ],
        [
            'name'      => 'Mozilla Firefox',
            'level'     =>  3,
            'type'      =>  'Navigateurs',
            'image'     =>  'Mozilla.jpg',
        ],
        [
            'name'      => 'MySQL',
            'level'     =>  2,
            'type'      =>  'Technologies',
            'image'     =>  'MySQL.png',
        ],
        [
            'name'      => 'MySQL Workbench',
            'level'     =>  2,
            'type'      =>  'Logiciels',
            'image'     =>  'MySQL-Workbench.png',
        ],
        [
            'name'      => 'Occitan',
            'level'     =>  3,
            'type'      =>  'Langues',
            'image'     =>  'Occitan.png',
        ],
        [
            'name'      => 'Open Office',
            'level'     =>  4,
            'type'      =>  'Bureautique',
            'image'     =>  'Open-Office.jpg',
        ],
        [
            'name'      => 'PHP procédural',
            'level'     =>  3,
            'type'      =>  'Technologies',
            'image'     =>  'PHPOld.png',
            'reference' =>  'php',
        ],
        [
            'name'      => 'PHP objet',
            'level'     =>  3,
            'type'      =>  'Technologies',
            'image'     =>  'PHPpoo.png',
            'reference' =>  'phpoo',
        ],
        [
            'name'      => 'PhpMyAdmin',
            'level'     =>  3,
            'type'      =>  'Database',
            'image'     =>  'PhpMyAdmin.png',
        ],
        [
            'name'      => 'PhpStorm',
            'level'     =>  3,
            'type'      =>  'Logiciels',
            'image'     =>  'PhpStorm.png',
        ],
        [
            'name'      => 'Safari',
            'level'     =>  2,
            'type'      =>  'Navigateurs',
            'image'     =>  'Safari.jpg',
        ],
        [
            'name'      => 'Skype',
            'level'     =>  4,
            'type'      =>  'Professionnel',
            'image'     =>  'Skype.jpg',
        ],
        [
            'name'      => 'Slim',
            'level'     =>  2,
            'type'      =>  'Technologies',
            'image'     =>  'Slim.png',
            'reference' =>  'slim',
        ],
        [
            'name'      => 'SublimText',
            'level'     =>  4,
            'type'      =>  'Logiciels',
            'image'     =>  'SublimText.jpg',
        ],
        [
            'name'      => 'Symfony 3',
            'level'     =>  2,
            'type'  =>  'Technologies',
            'image'     =>  'Symfony.png',
            'reference' =>  'symfony3',
        ],
        [
            'name'      => 'Twig',
            'level'     =>  4,
            'type'      =>  'Technologies',
            'image'     =>  'Twig.jpg',
            'reference' =>  'twig',
        ],
        [
            'name'      => 'WampServer',
            'level'     =>  2,
            'type'      =>  'Serveur',
            'image'     =>  'WampServer.png',
        ],
        [
            'name'      => 'Windows',
            'level'     =>  2,
            'type'      =>  'OS',
            'image'     =>  'Windows.png',
        ],
    ];

    /**
     * Set skills
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager)
    {
      foreach ($this->skills as $item){
          $skill = new Skill();

          $skill->setName($item['name']);
          $skill->setLevel($item['level']);
          $skill->settype($item['type']);
          $skill->setImage($item['image']);

          if ($item['type'] === 'Technologies' || $item['type'] === 'Logiciels' || $item['type'] === 'Navigateurs' || $item['type'] === 'Base de données' || $item['type'] === 'Serveur' || $item['type'] === 'OS'){
              $skill->setCategory('Developpement');
          }
          else {
              $skill->setCategory($item['type']);
          }

          if (isset($item['reference'])) {
              $this->addReference($item['reference'], $skill);
          }

          $manager->persist($skill);
      }
        $manager->flush();
    }


    /**
     * Loading order for data fixtures
     *
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}