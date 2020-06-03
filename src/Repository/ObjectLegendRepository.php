<?php

namespace App\Repository;

use App\Entity\ObjectLegend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ObjectLegend|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectLegend|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectLegend[]    findAll()
 * @method ObjectLegend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectLegendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectLegend::class);
    }

    // /**
    //  * @return ObjectLegend[] Returns an array of ObjectLegend objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjectLegend
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
