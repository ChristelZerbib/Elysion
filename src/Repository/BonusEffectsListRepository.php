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
    public function search($recherche=null,$type=null,$rang=null, $order='alpha')
        {
            $qb = $this->createQueryBuilder('a');
            $qb->join('a.rank', 'r');
            $qb->andWhere('a.bought = ?1'); 
            $qb->setParameter(1, 0);

            if($recherche !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('a.name', ':recherche'),
                        $qb->expr()->like('a.description', ':recherche')
                    )
                );
                $qb->setParameter('recherche', '%'.addcslashes($recherche, '%_').'%');
            } 

            if($rang !== null){
                $qb->andWhere('r.number LIKE :rang');
                $qb->setParameter('rang', $rang);
            }

            if($type !== null){
                $qb->andWhere('r.type LIKE :type');
                $qb->setParameter('type', $type->getType());
            }
            
            //choose order by price or alpha
            if ($order == 'alpha'){
                $qb->orderBy('a.name', 'ASC');
            }else{
                $qb->orderBy('r.price', 'ASC');            
            }
            return $qb->getQuery()->getResult();
        }
        public function searchadmin($recherche=null,$type=null,$rang=null, $order='alpha')
        {
            $qb = $this->createQueryBuilder('a');
            $qb->join('a.rank', 'r');

            if($recherche !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('a.name', ':recherche'),
                        $qb->expr()->like('a.description', ':recherche')
                    )
                );
                $qb->setParameter('recherche', '%'.addcslashes($recherche, '%_').'%');
            } 

            if($rang !== null){
                $qb->andWhere('r.number LIKE :rang');
                $qb->setParameter('rang', $rang);
            }

            if($type !== null){
                $qb->andWhere('r.type LIKE :type');
                $qb->setParameter('type', $type->getType());
            }
            
            //choose order by price or alpha
            if ($order == 'alpha'){
                $qb->orderBy('a.name', 'ASC');
            }else{
                $qb->orderBy('r.price', 'ASC');            
            }
            return $qb->getQuery()->getResult();
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
