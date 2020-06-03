<?php

namespace App\Repository;

use App\Entity\Titles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Titles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Titles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Titles[]    findAll()
 * @method Titles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Titles::class);
    }

    // /**
    //  * @return Titles[] Returns an array of Titles objects
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
    public function findOneBySomeField($value): ?Titles
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
