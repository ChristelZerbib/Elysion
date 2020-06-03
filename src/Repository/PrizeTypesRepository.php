<?php

namespace App\Repository;

use App\Entity\PrizeTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrizeTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrizeTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrizeTypes[]    findAll()
 * @method PrizeTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrizeTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrizeTypes::class);
    }

    // /**
    //  * @return PrizeTypes[] Returns an array of PrizeTypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrizeTypes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
