<?php

namespace App\Repository;

use App\Entity\WalkablePoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WalkablePoint>
 *
 * @method WalkablePoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method WalkablePoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method WalkablePoint[]    findAll()
 * @method WalkablePoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WalkableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WalkablePoint::class);
    }

//    /**
//     * @return Walkable[] Returns an array of Walkable objects
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

//    public function findOneBySomeField($value): ?Walkable
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
