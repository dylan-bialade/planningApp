<?php

namespace App\Repository;

use App\Entity\Planning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Planning>
 *
 * @method Planning|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planning|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planning[]    findAll()
 * @method Planning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Planning::class);
    }

    /**
     * Récupère les plannings d'un groupe donné
     */
    public function findByGroupe($groupeId): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.groupe', 'g')
            ->addSelect('g')
            ->where('g.id = :groupeId')
            ->setParameter('groupeId', $groupeId)
            ->getQuery()
            ->getResult();
    }
}