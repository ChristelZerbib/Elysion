<?php

namespace App\Repository;

use App\Entity\Lotteries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lotteries|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lotteries|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lotteries[]    findAll()
 * @method Lotteries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LotteriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lotteries::class);
    }

    // /**
    //  * @return Lotteries[] Returns an array of Lotteries objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lotteries
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
