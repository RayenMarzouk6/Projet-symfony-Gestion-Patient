<?php

namespace App\Repository;

use App\Entity\Soins;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Soins>
 *
 * @method Soins|null find($id, $lockMode = null, $lockVersion = null)
 * @method Soins|null findOneBy(array $criteria, array $orderBy = null)
 * @method Soins[]    findAll()
 * @method Soins[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoinsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soins::class);
    }

//    /**
//     * @return Soins[] Returns an array of Soins objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Soins
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
