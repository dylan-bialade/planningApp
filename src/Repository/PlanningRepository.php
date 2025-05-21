<?php

namespace App\Repository;

use App\Entity\Planning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Planning>
 */
class PlanningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Planning::class);
    }

    /**
     * Retourne tous les plannings liés à un groupe donné
     */
    public function findByGroupe($groupeId): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.groupe', 'g')
            ->addSelect('g')
            ->where('g.id = :groupeId')
            ->setParameter('groupeId', $groupeId)
            ->orderBy('p.dateDebut', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
