<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){
        $user1 = new User();
        $user1->setUsername('elodie.vianai');
        $user1->setPassword('cheval');
        $user1->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));
        $user1->setSalt('');
        $manager->persist($user1);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 6;
    }
}