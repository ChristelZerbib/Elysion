<?php

namespace App\Repository;

use App\Entity\FeatureTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FeatureTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method FeatureTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method FeatureTypes[]    findAll()
 * @method FeatureTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeatureTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FeatureTypes::class);
    }

    // /**
    //  * @return FeatureTypes[] Returns an array of FeatureTypes objects
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
    public function findOneBySomeField($value): ?FeatureTypes
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
