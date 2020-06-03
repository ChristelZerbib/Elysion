<?php

namespace App\Repository;

use App\Entity\FeatureLevels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FeatureLevels|null find($id, $lockMode = null, $lockVersion = null)
 * @method FeatureLevels|null findOneBy(array $criteria, array $orderBy = null)
 * @method FeatureLevels[]    findAll()
 * @method FeatureLevels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeatureLevelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FeatureLevels::class);
    }

    // /**
    //  * @return FeatureLevels[] Returns an array of FeatureLevels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FeatureLevels
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
