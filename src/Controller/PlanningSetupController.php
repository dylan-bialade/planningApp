<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Entity\Personnel;
use App\Service\PlanningGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningSetupController extends AbstractController
{
    #[Route('/planning/setup', name: 'planning_setup')]
    public function setup(EntityManagerInterface $em, PlanningGenerator $generator): Response
    {
        // Créer les groupes 1 à 10 s'ils n'existent pas
        for ($i = 1; $i <= 10; $i++) {
            $nom = "Groupe $i";
            $groupe = $em->getRepository(Groupe::class)->findOneBy(['nom' => $nom]);
            if (!$groupe) {
                $groupe = new Groupe();
                $groupe->setNom($nom);
                $em->persist($groupe);
            }

            // Ajouter 3 personnels par groupe
            for ($j = 1; $j <= 3; $j++) {
                $personnel = new Personnel();
                $personnel->setNom("Employe$i$j");
                $personnel->setPrenom("Auto");
                $personnel->setGroupe($groupe);
                $em->persist($personnel);
            }
        }

        $em->flush();

        // Générer le planning pour la semaine en cours
        $date = new \DateTimeImmutable();
        $date->setISODate((int)$date->format('o'), (int)$date->format('W'));

        $generator->generateWeek($date);

        return new Response('✅ Groupes, personnels et planning générés.');
    }
}
