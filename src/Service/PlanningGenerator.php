<?php

namespace App\Service;

use App\Entity\Planning;
use App\Entity\Groupe;
use App\Entity\Personnel;
use App\Repository\GroupeRepository;
use App\Repository\PersonnelRepository;
use Doctrine\ORM\EntityManagerInterface;

class PlanningGenerator
{
    public function __construct(
        private GroupeRepository $groupeRepo,
        private PersonnelRepository $personnelRepo,
        private EntityManagerInterface $em
    ) {}

    /**
     * Génère les plannings de toute une semaine ISO (matin + aprem) pour chaque groupe
     */
    public function generateWeek(\DateTimeInterface $startOfWeek, int $morningCount = 2, int $afternoonCount = 2): void
    {
        $groupes = $this->groupeRepo->findAll();

        for ($day = 0; $day < 7; $day++) {
            $date = (clone $startOfWeek)->modify("+$day days");

            // Suivi global des personnels déjà affectés ce jour-là
            $personnelsOccupesCeJour = [];

            foreach ($groupes as $groupe) {
                $personnels = $this->personnelRepo->findBy(['groupe' => $groupe]);

                $shifts = [
                    ['08:00', '12:00', $morningCount],
                    ['14:00', '18:00', $afternoonCount],
                ];

                foreach ($shifts as [$startTime, $endTime, $needed]) {
                    $start = new \DateTimeImmutable($date->format('Y-m-d') . ' ' . $startTime);
                    $end   = new \DateTimeImmutable($date->format('Y-m-d') . ' ' . $endTime);

                    $assigned = 0;

                    foreach ($personnels as $personnel) {
                        if ($assigned >= $needed) break;

                        if (
                            !in_array($personnel->getId(), $personnelsOccupesCeJour, true) &&
                            $this->isAvailable($personnel, $start, $end)
                        ) {
                            $planning = new Planning();
                            $planning->setDate($date);
                            $planning->setDateDebut($start);
                            $planning->setDateFin($end);
                            $planning->setPlage("$startTime - $endTime");
                            $planning->setSource('auto');
                            $planning->setPersonnel($personnel);
                            $planning->setGroupe($groupe);
                            $planning->setLibelle($personnel->getPrenom() . ' ' . $personnel->getNom());

                            $this->em->persist($planning);

                            $personnelsOccupesCeJour[] = $personnel->getId();
                            $assigned++;
                        }
                    }

                    // S'il manque des personnes : créer des créneaux vides
                    for ($i = 0; $i < $needed - $assigned; $i++) {
                        $planning = new Planning();
                        $planning->setDate($date);
                        $planning->setDateDebut($start);
                        $planning->setDateFin($end);
                        $planning->setPlage("$startTime - $endTime");
                        $planning->setSource('auto');
                        $planning->setGroupe($groupe);
                        $planning->setLibelle('🛑 Besoin de personnel');

                        $this->em->persist($planning);
                    }
                }
            }
        }

        $this->em->flush();
    }

    /**
     * Vérifie si le personnel est dispo au créneau donné (et respecte 11h de repos)
     */
    private function isAvailable(Personnel $personnel, \DateTimeInterface $start, \DateTimeInterface $end): bool
    {
        foreach ($personnel->getPlannings() as $existing) {
            // Chevauchement interdit
            if ($start < $existing->getDateFin() && $end > $existing->getDateDebut()) {
                return false;
            }

            // Repos minimum de 11h
            $interval = $existing->getDateFin()->diff($start);
            $hours = ($interval->days * 24) + $interval->h;
            if ($start < $existing->getDateFin() || $hours < 11) {
                return false;
            }
        }

        return true;
    }
}
