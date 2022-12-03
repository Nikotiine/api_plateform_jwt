<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setFirstName('admin');
        $admin->setLastName('admin');
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles([User::ROLE_ADMIN]);
        $admin->setPlainPassword('admin');

        $manager->persist($admin);

        $manager->flush();
    }
}
