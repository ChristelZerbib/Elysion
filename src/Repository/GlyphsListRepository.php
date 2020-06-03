<?php

namespace App\Repository;

use App\Entity\GlyphsList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GlyphsList|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlyphsList|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlyphsList[]    findAll()
 * @method GlyphsList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlyphsListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GlyphsList::class);
    }

    // /**
    //  * @return GlyphsList[] Returns an array of GlyphsList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GlyphsList
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
