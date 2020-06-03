<?php

namespace App\Repository;

use App\Entity\Rp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rp[]    findAll()
 * @method Rp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rp::class);
    }

    // /**
    //  * @return Rp[] Returns an array of Rp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rp
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
