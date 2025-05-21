<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\Personnel;
use App\Entity\Planning;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use App\Service\PlanningGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/planning')] // Préfixe commun
class PlanningController extends AbstractController
{
    private ?PlanningGenerator $generator;

    public function __construct(?PlanningGenerator $generator = null)
    {
        // Le service PlanningGenerator n’est injecté que si vous l’avez déclaré dans services.yaml
        $this->generator = $generator;
    }
     #[Route('/generate-ajax', name: 'planning_generate_ajax', methods: ['POST'])]
    public function generateAjax(
        Request $request,
        PlanningGenerator $generator
    ): JsonResponse {
        // Lecture des params JSON
        $params = json_decode($request->getContent(), true);
        $year  = (int)($params['year'] ?? date('Y'));
        $week  = (int)($params['week'] ?? date('W'));
        $mor  = (int)($params['morningCount'] ?? 2);
        $aft  = (int)($params['afternoonCount'] ?? 2);

        // Calcul du lundi ISO
        $date = new \DateTime();
        $date->setISODate($year, $week);

        // Génération
        $generator->generateWeek($date, $mor, $aft);

        return new JsonResponse(['status' => 'ok']);
    }

        // src/Controller/PlanningController.php

    #[Route('/events', name: 'planning_events')]
    public function events(PlanningRepository $repo): JsonResponse
    {
        $data = [];
        foreach ($repo->findAll() as $p) {
            $title = $p->getLibelle();
            if (!$title && $p->getPersonnel()) {
                $title = sprintf(
                    '%s %s (Groupe %d)',
                    $p->getPersonnel()->getPrenom(),
                    $p->getPersonnel()->getNom(),
                    $p->getPersonnel()->getGroupe()->getId()
                );
            }
            $data[] = [
                'id'    => $p->getId(),
                'title' => $title ?? 'Non assigné',
                'start' => $p->getDateDebut()->format(DATE_ATOM),
                'end'   => $p->getDateFin()->format(DATE_ATOM),
            ];
        }
        return new JsonResponse($data);
    }



    #[Route('/calendar', name: 'planning_calendar')]
    public function calendar(): Response
    {
        return $this->render('planning/calendar.html.twig');
    }

    // **** Liste des plannings ****
    #[Route('/list', name: 'planning_list')]
    public function list(PlanningRepository $planningRepository): Response
    {
        return $this->render('planning/list.html.twig', [
            'plannings' => $planningRepository->findAll(),
        ]);
    }

    // **** Temps de travail restant ****
    #[Route('/personnel/{id}/temps-travail', name: 'planning_temps_travail')]
    public function voirTempsTravail(Personnel $personnel): Response
    {
        $restant = $personnel->getTempsTravailRestant();
        return new Response("Il reste {$restant}h de travail à {$personnel->getPrenom()}.");
    }

    // **** Création manuelle d’un planning ****
    #[Route('/new', name: 'planning_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $planning = new Planning();
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personnel = $planning->getPersonnel();

            if (!$personnel->peutAccepterPlanning($planning)) {
                $this->addFlash('error', 'Ce personnel a dépassé son quota mensuel d’heures.');
                return $this->redirectToRoute('planning_new');
            }

            if (method_exists($planning, 'estCompatibleAvecDisponibilites')
                && !$planning->estCompatibleAvecDisponibilites()
            ) {
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

    // **** Génération automatique (semaine ISO) ****
    // Cette route n’est disponible que si le service PlanningGenerator est configuré
    // src/Controller/PlanningController.php

    #[Route('/generate/{year}/{week}', name: 'planning_generate')]
    public function generate(
        int $year,
        int $week,
        PlanningGenerator $generator
    ): Response {
        $date = new \DateTime();
        $date->setISODate($year, $week);

        $generator->generateWeek($date);

        $this->addFlash('success', "Planning généré pour la semaine $week de $year.");

        // Au lieu de 'planning_list', on passe à 'planning_calendar'
        return $this->redirectToRoute('planning_calendar');
    }

}
