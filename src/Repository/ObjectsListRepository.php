<?php

namespace App\Repository;

use App\Entity\ObjectsList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ObjectsList|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectsList|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectsList[]    findAll()
 * @method ObjectsList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectsListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectsList::class);
    }

    // /**
    //  * @return ObjectsList[] Returns an array of ObjectsList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjectsList
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
