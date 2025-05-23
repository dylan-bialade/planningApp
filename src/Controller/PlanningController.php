<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Entity\Planning;
use App\Entity\Groupe;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use App\Repository\GroupeRepository;
use App\Service\PlanningGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/planning')]
class PlanningController extends AbstractController
{
    private ?PlanningGenerator $generator;

    public function __construct(?PlanningGenerator $generator = null)
    {
        $this->generator = $generator;
    }

    #[Route('/available', name: 'planning_available', methods: ['POST'])]
    public function getAvailable(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $start = new \DateTime($data['start']);
        $end = new \DateTime($data['end']);
        $groupeId = $data['groupe'];

        $employes = $em->getRepository(Personnel::class)->createQueryBuilder('p')
            ->leftJoin('p.plannings', 'pl')
            ->where('p.groupe = :groupeId')
            ->setParameter('groupeId', $groupeId)
            ->getQuery()
            ->getResult();

        $disponibles = [];

        foreach ($employes as $e) {
            $isFree = true;
            foreach ($e->getPlannings() as $planning) {
                if (
                    $start < $planning->getDateFin() &&
                    $end > $planning->getDateDebut()
                ) {
                    $isFree = false;
                    break;
                }
            }

            if ($isFree) {
                $disponibles[] = [
                    'id' => $e->getId(),
                    'nom' => $e->getNom(),
                    'prenom' => $e->getPrenom()
                ];
            }
        }

        return new JsonResponse($disponibles);
    }

    #[Route('/update', name: 'planning_update', methods: ['POST'])]
    public function update(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['id'], $data['start'], $data['end'])) {
            return new JsonResponse(['status' => 'error', 'message' => 'Champs manquants.']);
        }

        $planning = $em->getRepository(Planning::class)->find($data['id']);

        if (!$planning) {
            return new JsonResponse(['status' => 'error', 'message' => 'Planning non trouvé.']);
        }

        $planning->setDateDebut(new \DateTime($data['start']));
        $planning->setDateFin(new \DateTime($data['end']));
        $planning->setDate((new \DateTime($data['start']))->setTime(0, 0));
        $em->flush();

        return new JsonResponse(['status' => 'ok']);
    }

    #[Route('/delete', name: 'planning_delete', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['id'])) {
            return new JsonResponse(['status' => 'error', 'message' => 'ID manquant.']);
        }

        $planning = $em->getRepository(Planning::class)->find($data['id']);

        if (!$planning) {
            return new JsonResponse(['status' => 'error', 'message' => 'Planning non trouvé.']);
        }

        $em->remove($planning);
        $em->flush();

        return new JsonResponse(['status' => 'ok']);
    }

    #[Route('/add-ajax', name: 'planning_add_ajax', methods: ['POST'])]
public function addAjax(Request $request, EntityManagerInterface $em): JsonResponse
{
    $data = json_decode($request->getContent(), true);

    $date     = $data['date'] ?? null;
    $start    = $data['start'] ?? null;
    $end      = $data['end'] ?? null;
    $nom      = $data['nom'] ?? null;
    $prenom   = $data['prenom'] ?? null;
    $groupeId = $data['groupe_id'] ?? $data['groupe'] ?? null;

    if (!$date || !$start || !$end || !$nom || !$prenom || !$groupeId) {
        return new JsonResponse(['success' => false, 'message' => 'Paramètres manquants.'], 400);
    }

    try {
        $dateDebut = new \DateTime("$date $start");
        $dateFin   = new \DateTime("$date $end");
    } catch (\Exception $e) {
        return new JsonResponse(['success' => false, 'message' => 'Format de date invalide.'], 400);
    }

    $groupe = $em->getRepository(Groupe::class)->find($groupeId);
    if (!$groupe) {
        return new JsonResponse(['success' => false, 'message' => 'Groupe non trouvé.'], 404);
    }

    $personnel = $em->getRepository(Personnel::class)->findOneBy([
        'nom' => $nom,
        'prenom' => $prenom
    ]);
    if (!$personnel) {
        return new JsonResponse(['success' => false, 'message' => 'Personnel non trouvé.'], 404);
    }

    $conflits = $em->getRepository(Planning::class)->createQueryBuilder('p')
        ->where('p.personnel = :personnel')
        ->andWhere('(:start < p.dateFin AND :end > p.dateDebut)')
        ->setParameter('personnel', $personnel)
        ->setParameter('start', $dateDebut)
        ->setParameter('end', $dateFin)
        ->getQuery()
        ->getResult();

    if (count($conflits) > 0) {
        return new JsonResponse(['success' => false, 'message' => 'Conflit détecté dans le planning.'], 409);
    }

    $planning = new Planning();
    $planning->setDate(new \DateTime($date));
    $planning->setPlage("$start - $end");
    $planning->setDateDebut($dateDebut);
    $planning->setDateFin($dateFin);
    $planning->setSource('manuel');
    $planning->setLibelle("$prenom $nom (Groupe {$groupe->getNom()})");
    $planning->setPersonnel($personnel);
    $planning->setGroupe($groupe);

    $em->persist($planning);
    $em->flush();

    return new JsonResponse(['success' => true, 'message' => 'Créneau ajouté avec succès.']);
}




    #[Route('/generate-ajax', name: 'planning_generate_ajax', methods: ['POST'])]
    public function generateAjax(Request $request, PlanningGenerator $generator): JsonResponse
    {
        $params = json_decode($request->getContent(), true);
        $year = (int)($params['year'] ?? date('Y'));
        $week = (int)($params['week'] ?? date('W'));
        $mor = (int)($params['morningCount'] ?? 2);
        $aft = (int)($params['afternoonCount'] ?? 2);

        $date = new \DateTime();
        $date->setISODate($year, $week);

        $generator->generateWeek($date, $mor, $aft);

        return new JsonResponse(['status' => 'ok']);
    }

    #[Route('/events', name: 'planning_events')]
    public function events(Request $request, PlanningRepository $repo): JsonResponse
    {
        $groupeId = $request->query->get('groupe');

        $plannings = $groupeId
            ? $repo->findByGroupe($groupeId)
            : $repo->findAll();

        $data = [];

        foreach ($plannings as $p) {
            $title = $p->getLibelle();
            if (!$title && $p->getPersonnel()) {
                $title = sprintf('%s %s', $p->getPersonnel()->getPrenom(), $p->getPersonnel()->getNom());
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
    public function calendar(GroupeRepository $groupeRepo): Response
    {
        return $this->render('planning/calendar.html.twig', [
            'groupes' => $groupeRepo->findAll(),
        ]);
    }

    #[Route('/list', name: 'planning_list')]
    public function list(PlanningRepository $planningRepository): Response
    {
        return $this->render('planning/list.html.twig', [
            'plannings' => $planningRepository->findAll(),
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

            if (!$personnel->peutAccepterPlanning($planning)) {
                $this->addFlash('error', 'Ce personnel a dépassé son quota mensuel d’heures.');
                return $this->redirectToRoute('planning_new');
            }

            if (method_exists($planning, 'estCompatibleAvecDisponibilites') && !$planning->estCompatibleAvecDisponibilites()) {
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

    #[Route('/generate/{year}/{week}', name: 'planning_generate')]
    public function generate(int $year, int $week, PlanningGenerator $generator): Response
    {
        $date = new \DateTime();
        $date->setISODate($year, $week);

        $generator->generateWeek($date);

        $this->addFlash('success', "Planning généré pour la semaine $week de $year.");

        return $this->redirectToRoute('planning_calendar');
    }
}