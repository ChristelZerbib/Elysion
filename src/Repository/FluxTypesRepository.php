<?php

namespace App\Repository;

use App\Entity\FluxTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FluxTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method FluxTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method FluxTypes[]    findAll()
 * @method FluxTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FluxTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FluxTypes::class);
    }

    // /**
    //  * @return FluxTypes[] Returns an array of FluxTypes objects
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
    public function findOneBySomeField($value): ?FluxTypes
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
