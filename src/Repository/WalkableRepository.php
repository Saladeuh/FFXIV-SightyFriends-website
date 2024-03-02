<?php

namespace App\Repository;

use App\Entity\Walkable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Walkable>
 *
 * @method Walkable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Walkable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Walkable[]    findAll()
 * @method Walkable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WalkableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Walkable::class);
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
