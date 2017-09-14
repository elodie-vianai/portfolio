<?php

# Fixture pour les tests.Y-

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Image;
use AppBundle\Entity\Training;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadTraining
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadTraining extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $trainings = [
        [
            'name'              =>  'Baccalauréat général, série Littéraire',
            'type'              =>  'Diplôme',
            'institution'       =>  'Lycée Jean-Pierre Vernant',
            'city'              =>  'Pins-Justaret',
            'begin_at_year'     =>  '2009',
            'begin_at_month'    =>  '9',
            'begin_at_day'      =>  '2',
            'end_at_year'       =>  '2010',
            'end_at_month'      =>  '7',
            'end_at_day'        =>  '1',
            'mention'           =>  'P',
            'dep'               =>  '31',
            'ref'               =>  'bac',
        ],
        [
            'name'              =>  'Licence Langues, Littérature et Civilisation Etrangères',
            'type'              =>  'Formation',
            'institution'       =>  'Université Toulouse 2 Le Mirail',
            'city'              =>  'Toulouse',
            'begin_at_year'     =>  '2010',
            'begin_at_month'    =>  '10',
            'begin_at_day'      =>  '4',
            'end_at_year'       =>  '2011',
            'end_at_month'      =>  '5',
            'end_at_day'        =>  '14',
            'mention'           =>  'P',
            'dep'               =>  '31',
            'image'             =>  'logoMirail.png',
            'ref'               =>  'llcer',
        ],
        [
            'name'              =>  'Licence d\'Histoire',
            'type'              =>  'Diplôme',
            'institution'       =>  'Université Toulouse 2 Le Mirail',
            'city'              =>  'Toulouse',
            'begin_at_year'     =>  '2011',
            'begin_at_month'    =>  '9',
            'begin_at_day'      =>  '19',
            'end_at_year'       =>  '2014',
            'end_at_month'      =>  '5',
            'end_at_day'        =>  '30',
            'mention'           =>  'P',
            'dep'               =>  '31',
            'image'             =>  'logoMirail.png',
            'ref'               =>  'histoire',
        ],
        [
            'name'              =>  'Licence professionnelle Image et Histoire',
            'type'              =>  'Diplôme',
            'institution'       =>  'Université Toulouse 2 Jean Jaurès',
            'city'              =>  'Toulouse',
            'begin_at_year'     =>  '2014',
            'begin_at_month'    =>  '9',
            'begin_at_day'      =>  '9',
            'end_at_year'       =>  '2015',
            'end_at_month'      =>  '5',
            'end_at_day'        =>  '29',
            'mention'           =>  'AB',
            'dep'               =>  '31',
            'image'             =>  'logoUT2J.png',
            'ref'               =>  'lp',
        ],
        [
            'name'              =>  'Maîtrise d\'Information-Documentation',
            'type'              =>  'Diplôme',
            'institution'       =>  'Université Toulouse 2 Jean Jaurès',
            'city'              =>  'Toulouse',
            'begin_at_year'     =>  '2015',
            'begin_at_month'    =>  '9',
            'begin_at_day'      =>  '7',
            'end_at_year'       =>  '2016',
            'end_at_month'      =>  '6',
            'end_at_day'        =>  '10',
            'mention'           =>  'AB',
            'dep'               =>  '31',
            'image'             =>  'logoUT2J.png',
            'ref'               =>  'm1',
        ],
        [
            'name'              =>  'Master 2 Ingénierie de l\'Information Numérique, I2N',
            'type'              =>  'Diplôme',
            'institution'       =>  'Université Toulouse 2 Jean Jaurès',
            'city'              =>  'Toulouse',
            'begin_at_year'     =>  '2016',
            'begin_at_month'    =>  '9',
            'begin_at_day'      =>  '5',
            'end_at_year'       =>  '2017',
            'end_at_month'      =>  '9',
            'end_at_day'        =>  '29',
            'mention'           =>  'P',
            'dep'               =>  '31',
            'image'             =>  'logoUT2J.png',
            'ref'               =>  'm2',
        ],
    ];


    /**
     * Set trainings
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->trainings as $item){
            $training = new Training();

            $training->setName($item['name']);
            $training->setType($item['type']);
            $training->setInstitution($item['institution']);
            $training->setCity($item['city']);
            $begin_at = new \DateTime();
            $begin_at->setDate($item['begin_at_year'], $item['begin_at_month'], $item['begin_at_day']);
            $training->setBeginAt($begin_at);
            $end_at = new \DateTime();
            $end_at->setDate($item['end_at_year'], $item['end_at_month'], $item['end_at_day']);
            $training->setEndAt($end_at);
            $training->setMention($item['mention']);
            $training->setDepartment($this->getReference($item['dep']));

            if (isset($item['image'])) {
                $training->setImage($item['image']);
            }

            $manager->persist($training);

            $this->setReference($item['ref'], $training);
        }

        $manager->flush();
    }


    /**
     * @return int
     */
    public function getOrder()
    {
        return 4;
    }
}