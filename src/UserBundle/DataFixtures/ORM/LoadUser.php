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
        $user1->setPlainPassword('cheval');
        $user1->setEmail('elodie.vianai@web-atrio.com');
        $user1->setEnabled(1);
        $user1->setSalt('');
        $user1->setRoles(array('ROLE_ADMIN'));

        $user2 = new User();
        $user2->setUsername('test');
        $user2->setPassword('test');
        $user2->setPlainPassword('test');
        $user2->setEmail('test@externe.com');
        $user2->setEnabled(1);
        $user2->setSalt('');
        $user2->setRoles(array('ROLE_USER'));

        $manager->persist($user1);
        $manager->persist($user2);

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