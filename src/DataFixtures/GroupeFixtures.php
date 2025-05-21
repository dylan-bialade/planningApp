<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $groupe = new Groupe();
            $groupe->setNom('Groupe ' . $i);
            $manager->persist($groupe);
        }

        $manager->flush();
    }
}
