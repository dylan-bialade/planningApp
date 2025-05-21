<?php

namespace App\Controller;

use App\Entity\Groupe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupeController extends AbstractController
{
    #[Route('/generate-groupes', name: 'generate_groupes')]
    public function generateGroupes(EntityManagerInterface $em): Response
    {
        // Vérifie s'ils existent déjà
        $repo = $em->getRepository(Groupe::class);
        $existants = $repo->count([]);

        if ($existants >= 10) {
            return new Response('🚫 Les groupes semblent déjà exister.');
        }

        for ($i = 1; $i <= 10; $i++) {
            $groupe = new Groupe();
            $groupe->setNom('Groupe ' . $i);
            $em->persist($groupe);
        }

        $em->flush();

        return new Response('✅ Groupes 1 à 10 créés avec succès.');
    }
}
