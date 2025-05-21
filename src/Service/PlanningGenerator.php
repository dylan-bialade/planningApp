<?php

namespace App\Service;

use App\Entity\Personnel;
use App\Entity\Planning;
use Doctrine\ORM\EntityManagerInterface;

class PlanningGenerator
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function generateWeek(\DateTimeInterface $startOfWeek, int $morningCount = 2, int $afternoonCount = 2): void
    {
        $personnels = $this->em->getRepository(Personnel::class)->findAll();

        // Récupère les plannings existants de la semaine pour vérifier les repos
        $existingPlannings = $this->em->getRepository(Planning::class)->findAll();

        for ($i = 0; $i < 7; $i++) {
            $day = (clone $startOfWeek)->modify("+{$i} days");
            $shifts = [
                ['06:45', '14:00'],
                ['08:00', '16:00'],
                ['14:00', '21:00'],
                ['16:00', '22:00'],
            ];

            foreach ($shifts as $shift) {
                $start = new \DateTime($day->format('Y-m-d') . ' ' . $shift[0]);
                $end = new \DateTime($day->format('Y-m-d') . ' ' . $shift[1]);

                $availablePersonnel = $this->findAvailablePersonnel($personnels, $existingPlannings, $start);

                if ($availablePersonnel) {
                    $planning = new Planning();
                    $planning->setPersonnel($availablePersonnel);
                    $planning->setDateDebut($start);
                    $planning->setDateFin($end);
                    $planning->setDate($day);
                    $planning->setPlage($shift[0] . ' - ' . $shift[1]);
                    $planning->setSource('auto'); // ou tout autre libellé comme 'généré automatiquement'

                    $existingPlannings[] = $planning;
                    $this->em->persist($planning);
                } else {
                    $planning = new Planning();
                    $planning->setDateDebut($start);
                    $planning->setDateFin($end);
                    $planning->setDate($day);
                    $planning->setPlage($shift[0] . ' - ' . $shift[1]);
                    $planning->setSource('auto'); // ou tout autre libellé comme 'généré automatiquement'

                    $planning->setLibelle("Besoin de personnel");
                    $this->em->persist($planning);
                }

            }
        }

        $this->em->flush();
    }

    private function findAvailablePersonnel(array $personnels, array $existingPlannings, \DateTimeInterface $shiftStart): ?Personnel
    {
        foreach ($personnels as $personnel) {
            $canWork = true;

            foreach ($existingPlannings as $planning) {
                if ($planning->getPersonnel() === $personnel) {
                    $lastEnd = $planning->getDateFin();
                    $interval = $lastEnd->diff($shiftStart);
                    $hours = ($interval->days * 24) + $interval->h;

                    if ($shiftStart < $lastEnd || $hours < 11) {
                        $canWork = false;
                        break;
                    }
                }
            }

            if ($canWork) {
                return $personnel;
            }
        }

        return null;
    }
}
