<?php

namespace App\Repository;

use App\Entity\Magic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Magic|null find($id, $lockMode = null, $lockVersion = null)
 * @method Magic|null findOneBy(array $criteria, array $orderBy = null)
 * @method Magic[]    findAll()
 * @method Magic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MagicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Magic::class);
    }

    // /**
    //  * @return Magic[] Returns an array of Magic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Magic
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
