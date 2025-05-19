<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Structure;
use App\Entity\Groupe;
use App\Entity\Personnel;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Créer 2 structures
        for ($s = 1; $s <= 2; $s++) {
            $structure = new Structure();
            $structure->setNom("Structure $s");
            $manager->persist($structure);

            // 4 ou 6 groupes selon la structure
            $nbGroupes = ($s === 1) ? 4 : 6;
            for ($g = 1; $g <= $nbGroupes; $g++) {
                $groupe = new Groupe();
                $groupe->setNom("Groupe $g");
                $groupe->setStructure($structure);
                $manager->persist($groupe);

                // Créer quelques personnels pour chaque groupe
                for ($i = 0; $i < 5; $i++) {
                    $p = new Personnel();
                    $p->setNom($faker->lastName());
                    $p->setPrenom($faker->firstName());
                    $p->setAge($faker->numberBetween(18, 70));
                    $p->setHeuresMensuelles(160);
                    $p->setStatut($faker->randomElement(['titulaire','interimaire','alternant','stagiaire']));
                    $p->setTypeContrat($faker->randomElement(['CDI','CDD','Temps plein','Temps partiel']));
                    $p->setGroupe($groupe);
                    $manager->persist($p);
                }
            }
        }

        $manager->flush();
    }
}
