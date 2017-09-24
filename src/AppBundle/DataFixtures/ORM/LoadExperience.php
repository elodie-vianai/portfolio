<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Experience;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadExperience
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadExperience extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $experiences = [
        [
            'name'              =>  'Employée polyvalente de restauration',
            'contract'          =>  'CDI',
            'company'           =>  'Flunch',
            'city'              =>  'Portet-sur-Garonne',
            'begin_at_year'     =>  '2013',
            'begin_at_month'    =>  '10',
            'begin_at_day'      =>  '18',
            'end_at_year'       =>  '2017',
            'end_at_month'      =>  '1',
            'end_at_day'        =>  '1',
            'dep'               =>  '31',
            'image'             =>  'logoFlunch.jpg',
            'ref'               =>  'Flunch',
        ],
        [
            'name'              =>  'Documentaliste stagiaire',
            'contract'          =>  'Stage',
            'company'           =>  'Musée National du Sport',
            'city'              =>  'Nice',
            'begin_at_year'     =>  '2015',
            'begin_at_month'    =>  '2',
            'begin_at_day'      =>  '15',
            'end_at_year'       =>  '2015',
            'end_at_month'      =>  '6',
            'end_at_day'        =>  '19',
            'dep'               =>  '06',
            'image'             =>  'logoMNS.png',
            'ref'               =>  'MNS',
        ],
        [
            'name'              =>  'Développeuse web stagiaire',
            'contract'          =>  'Stage',
            'company'           =>  'Computys',
            'city'              =>  'Colomiers',
            'begin_at_year'     =>  '2015',
            'begin_at_month'    =>  '10',
            'begin_at_day'      =>  '19',
            'end_at_year'       =>  '2015',
            'end_at_month'      =>  '12',
            'end_at_day'        =>  '18',
            'dep'               =>  '31',
            'image'             =>  'logoComputys.png',
            'ref'               =>  'Computys',
        ],
        [
            'name'              =>  'Développeuse web stagiaire',
            'contract'          =>  'Stage',
            'company'           =>  'Web-atrio',
            'city'              =>  'Blagnac',
            'begin_at_year'     =>  '2017',
            'begin_at_month'    =>  '3',
            'begin_at_day'      =>  '27',
            'end_at_year'       =>  '2017',
            'end_at_month'      =>  '9',
            'end_at_day'        =>  '30',
            'dep'               =>  '31',
            'image'             =>  'logoWA-all.png',
            'ref'               =>  'WA'
        ],
    ];

        /**
         * Set experiences
         *
         * @param \Doctrine\Common\Persistence\ObjectManager $manager
         * @return void
         */
        public function load(ObjectManager $manager)
    {
        foreach ($this->experiences as $item) {
            $experience = new Experience();

            $experience->setName($item['name']);
            $experience->setContract($item['contract']);
            $experience->setCompany($item['company']);
            $experience->setCity($item['city']);
            $begin_at = new  \DateTime();
            $begin_at->setDate($item['begin_at_year'], $item['begin_at_month'], $item['begin_at_day']);
            $experience->setBeginAt($begin_at);
            $end_at = new  \DateTime();
            $end_at->setDate($item['end_at_year'], $item['end_at_month'], $item['end_at_day']);
            $experience->setEndAt($end_at);
            $experience->setDepartment($this->getReference($item['dep']));
            $experience->setImage($item['image']);

            $this->addReference($item['ref'], $experience);

            $manager->persist($experience);

            $manager->flush();
        }
    }


        /**
         * Loading order for the data fixtures
         *
         * @return int
         */
    public function getOrder()
    {
        return 5;
    }

}