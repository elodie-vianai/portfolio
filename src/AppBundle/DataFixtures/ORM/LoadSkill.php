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
            'category'  =>  'Graphisme',
            'image'     =>  'Illustrator.png',
        ],
        [
            'name'      => 'Adobe Photoshop',
            'level'     =>  3,
            'category'  =>  'Graphisme',
            'image'     =>  'Photoshop.png',
        ],
        [
            'name'      => 'Anglais',
            'level'     =>  2,
            'category'  =>  'Langues',
            'image'     =>  'Anglais.jpg',
        ],
        [
            'name'      => 'Brackets',
            'level'     =>  4,
            'category'  =>  'Logiciels',
            'image'     =>  'Brackets.jpg',
        ],
        [
            'name'      => 'Bootstrap 3',
            'level'     =>  3,
            'category'  =>  'Technologies',
            'image'     =>  'Bootstrap3.png',
            'reference' =>  'bootstrap3',
        ],
        [
            'name'      => 'Bootstrap 4',
            'level'     =>  3,
            'category'  =>  'Technologies',
            'image'     =>  'Bootstrap4.png',
            'reference' =>  'bootstrap4',
        ],
        [
            'name'      => 'CSS 3',
            'level'     =>  3,
            'category'  =>  'Technologies',
            'image'     =>  'CSS.png',
            'reference' =>  'css',
        ],
        [
            'name'      => 'Espagnol',
            'level'     =>  1,
            'category'  =>  'Langues',
            'image'     =>  'Espagnol.jpg',
        ],
        [
            'name'      => 'FileZilla',
            'level'     =>  1,
            'category'  =>  'Logiciels',
            'image'     =>  'FileZilla.png',
        ],
        [
            'name'      => 'Git',
            'level'     =>  1,
            'category'  =>  'Logiciels',
            'image'     =>  'Git.png',
        ],
        [
            'name'      => 'GitHub',
            'level'     =>  3,
            'category'  =>  'Logiciels',
            'image'     =>  'GitHub.png',
        ],
        [
            'name'      => 'Google Chrome',
            'level'     =>  4,
            'category'  =>  'Navigateurs',
            'image'     =>  'Chrome.jpg',
        ],
        [
            'name'      => 'Google Documents',
            'level'     =>  4,
            'category'  =>  'Bureautique',
            'image'     =>  'Google-docs.jpg',
        ],
        [
            'name'      => 'HTML 5',
            'level'     =>  3,
            'category'  =>  'Technologies',
            'reference' =>  'html',
            'image'     =>  'HTML.png',
        ],
        [
            'name'      => 'JavaScript',
            'level'     =>  1   ,
            'category'  =>  'Technologies',
            'image'     =>  'Javascript.png',
            'reference' =>  'javascript',
        ],
        [
            'name'      => 'Microsoft Office',
            'level'     =>  5,
            'category'  =>  'Bureautique',
            'image'     =>  'MS-Office.png',
        ],
        [
            'name'      => 'Mozilla Firefox',
            'level'     =>  3,
            'category'  =>  'Navigateurs',
            'image'     =>  'Mozilla.jpg',
        ],
        [
            'name'      => 'MySQL',
            'level'     =>  2,
            'category'  =>  'Technologies',
            'image'     =>  'MySQL.png',
        ],
        [
            'name'      => 'MySQL Workbench',
            'level'     =>  2,
            'category'  =>  'Logiciels',
            'image'     =>  'MySQL-Workbench.png',
        ],
        [
            'name'      => 'Occitan',
            'level'     =>  3,
            'category'  =>  'Langues',
            'image'     =>  'Occitan.png',
        ],
        [
            'name'      => 'Open Office',
            'level'     =>  4,
            'category'  =>  'Bureautique',
            'image'     =>  'Open-Office.jpg',
        ],
        [
            'name'      => 'PHP procédural',
            'level'     =>  3,
            'category'  =>  'Technologies',
            'image'     =>  'PHPOld.png',
            'reference' =>  'php',
        ],
        [
            'name'      => 'PHP objet',
            'level'     =>  3,
            'category'  =>  'Technologies',
            'image'     =>  'PHPpoo.png',
            'reference' =>  'phpoo',
        ],
        [
            'name'      => 'PhpMyAdmin',
            'level'     =>  3,
            'category'  =>  'Database',
            'image'     =>  'PhpMyAdmin.png',
        ],
        [
            'name'      => 'PhpStorm',
            'level'     =>  3,
            'category'  =>  'Logiciels',
            'image'     =>  'PhpStorm.png',
        ],
        [
            'name'      => 'Safari',
            'level'     =>  2,
            'category'  =>  'Navigateurs',
            'image'     =>  'Safari.jpg',
        ],
        [
            'name'      => 'Skype',
            'level'     =>  4,
            'category'  =>  'Professionnel',
            'image'     =>  'Skype.jpg',
        ],
        [
            'name'      => 'Slim',
            'level'     =>  2,
            'category'  =>  'Technologies',
            'image'     =>  'Slim.png',
            'reference' =>  'slim',
        ],
        [
            'name'      => 'SublimText',
            'level'     =>  4,
            'category'  =>  'Logiciels',
            'image'     =>  'SumblimText.jpg',
        ],
        [
            'name'      => 'Symfony 3',
            'level'     =>  2,
            'category'  =>  'Technologies',
            'image'     =>  'Symfony.png',
            'reference' =>  'symfony3',
        ],
        [
            'name'      => 'Twig',
            'level'     =>  4,
            'category'  =>  'Technologies',
            'image'     =>  'Twig.jpg',
            'reference' =>  'twig',
        ],
        [
            'name'      => 'WampServer',
            'level'     =>  2,
            'category'  =>  'Serveur',
            'image'     =>  'WampServer.png',
        ],
        [
            'name'      => 'Windows',
            'level'     =>  2,
            'category'  =>  'OS',
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
          $skill->setCategory($item['category']);
          $skill->setImage($item['image']);

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