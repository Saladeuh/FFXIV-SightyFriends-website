<?php

namespace App\Repository;

use App\Entity\WalkableSegment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WalkableSegment>
 *
 * @method WalkableSegment|null find($id, $lockMode = null, $lockVersion = null)
 * @method WalkableSegment|null findOneBy(array $criteria, array $orderBy = null)
 * @method WalkableSegment[]    findAll()
 * @method WalkableSegment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WalkableSegmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WalkableSegment::class);
    }

    //    /**
    //     * @return WalkableSegment[] Returns an array of WalkableSegment objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?WalkableSegment
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
