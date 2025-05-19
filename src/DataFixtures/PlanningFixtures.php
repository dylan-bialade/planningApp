<?php
namespace App\DataFixtures;

use App\Entity\Planning;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlanningFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $planning = new Planning();
            $dateDebut = new \DateTime("+$i days 08:00");
            $dateFin = (clone $dateDebut)->modify('+2 hours');

            $planning->setTitre("Événement $i");
            $planning->setDescription("Description de l'événement $i");
            $planning->setDateDebut($dateDebut);
            $planning->setDateFin($dateFin);

            $manager->persist($planning);
        }

        $manager->flush();
    }
}
