<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Entity\Planning;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/planning')]
class PlanningController extends AbstractController
{
    #[Route('/list', name: 'planning_list')]
    public function list(PlanningRepository $planningRepository): Response
    {
        return $this->render('planning/list.html.twig', [
            'plannings' => $planningRepository->findAll()
        ]);
    }

    #[Route('/personnel/{id}/temps-travail', name: 'planning_temps_travail')]
    public function voirTempsTravail(Personnel $personnel): Response
    {
        $restant = $personnel->getTempsTravailRestant();
        return new Response("Il reste {$restant}h de travail à {$personnel->getPrenom()}.");
    }

    #[Route('/new', name: 'planning_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $planning = new Planning();
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personnel = $planning->getPersonnel();

            // Vérification des contraintes
            if (!$personnel->peutAccepterPlanning($planning)) {
                $this->addFlash('error', 'Ce personnel a dépassé son quota mensuel d’heures.');
                return $this->redirectToRoute('planning_new');
            }

            if (!$planning->estCompatibleAvecDisponibilites()) {
                $this->addFlash('error', 'Ce personnel n’est pas disponible à ce créneau.');
                return $this->redirectToRoute('planning_new');
            }

            $em->persist($planning);
            $em->flush();

            $this->addFlash('success', 'Planning ajouté avec succès.');
            return $this->redirectToRoute('planning_list');
        }

        return $this->render('planning/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
