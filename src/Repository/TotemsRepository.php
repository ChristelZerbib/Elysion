<?php

namespace App\Repository;

use App\Entity\Totems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Totems|null find($id, $lockMode = null, $lockVersion = null)
 * @method Totems|null findOneBy(array $criteria, array $orderBy = null)
 * @method Totems[]    findAll()
 * @method Totems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Totems::class);
    }

    // /**
    //  * @return Totems[] Returns an array of Totems objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Totems
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
