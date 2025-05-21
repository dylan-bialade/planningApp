<?php
namespace App\Controller;

use App\Entity\Personnel;
use App\Form\PersonnelType;
use App\Repository\PersonnelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personnel')]
class PersonnelController extends AbstractController
{
    #[Route('/list', name: 'personnel_list')]
    public function list(PersonnelRepository $repo): Response
    {
        return $this->render('personnel/list.html.twig', [
            'personnels' => $repo->findAll(),
        ]);
    }

    #[Route('/new', name: 'personnel_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $p = new Personnel();
        $form = $this->createForm(PersonnelType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('personnel_list');
        }
        return $this->render('personnel/new.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/{id}/dispo', name: 'personnel_dispo')]
    public function dispo(Personnel $personnel, Request $request, EntityManagerInterface $em): Response
    {
        // gérer indispo via formulaire
    }
    #[Route('/personnel/indisponibilite', name: 'personnel_indisponibilite')]
    public function nouvelleIndisponibilite(Request $request, EntityManagerInterface $em): Response
    {
        // 1. Crée l’objet
        $indispo = new Indisponibilite();

        // 2. Génère le formulaire (voir étape 2)
        $form = $this->createForm(IndisponibiliteType::class, $indispo);
        $form->handleRequest($request);

        // 3. Traitement POST
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($indispo);
            $em->flush();

            $this->addFlash('success', 'Indisponibilité enregistrée.');
            return $this->redirectToRoute('app_home');
        }

        // 4. Affiche le formulaire
        return $this->render('personnel/indisponibilite.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}