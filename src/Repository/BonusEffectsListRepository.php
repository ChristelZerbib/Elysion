<?php

namespace App\Repository;

use App\Entity\BonusEffectsList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BonusEffectsList|null find($id, $lockMode = null, $lockVersion = null)
 * @method BonusEffectsList|null findOneBy(array $criteria, array $orderBy = null)
 * @method BonusEffectsList[]    findAll()
 * @method BonusEffectsList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonusEffectsListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BonusEffectsList::class);
    }

    // /**
    //  * @return BonusEffectsList[] Returns an array of BonusEffectsList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BonusEffectsList
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
