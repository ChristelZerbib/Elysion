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

     public function search($recherche=null,$type=null,$subtype=null,$shop=null, $order='alpha')
        {
            $qb = $this->createQueryBuilder('a');
            $qb->join('a.subtype', 't');
            $qb->andWhere('a.characters IS NULL'); 

            if($recherche !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('a.name', ':recherche'),
                        $qb->expr()->like('a.description', ':recherche')
                    )
                );
                $qb->setParameter('recherche', '%'.addcslashes($recherche, '%_').'%');
            } 

            if($shop !== null){
                $qb->andWhere('a.shop LIKE :shop');
                $qb->setParameter('shop', $shop);
            }

            if($type !== null){
                $qb->andWhere('t.type LIKE :type');
                $qb->setParameter('type', $type);
            }

            if($subtype !== null){
                $qb->andWhere('t.id = :subtype');
                $qb->setParameter('subtype', $subtype);
            }
            
            //choose order by price or alpha
            if ($order == 'alpha'){
                $qb->orderBy('a.name', 'ASC');
            }else{
                $qb->orderBy('a.price', 'ASC');            
            }
            return $qb->getQuery()->getResult();
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
