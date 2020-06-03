<?php

namespace App\Repository;

use App\Entity\UpFeature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UpFeature|null find($id, $lockMode = null, $lockVersion = null)
 * @method UpFeature|null findOneBy(array $criteria, array $orderBy = null)
 * @method UpFeature[]    findAll()
 * @method UpFeature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UpFeatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UpFeature::class);
    }

    // /**
    //  * @return UpFeature[] Returns an array of UpFeature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UpFeature
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
