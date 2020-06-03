<?php

namespace App\Repository;

use App\Entity\Prizes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prizes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prizes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prizes[]    findAll()
 * @method Prizes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrizesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prizes::class);
    }

    // /**
    //  * @return Prizes[] Returns an array of Prizes objects
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
    public function findOneBySomeField($value): ?Prizes
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
