<?php
 
namespace App\Repository;

use App\Entity\GlyphsList;
use App\Entity\IngredientTypesList;
use App\Entity\Rarity;
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

    public function search($recherche=null,$type=null,$effect=null, $support=null, $order='alpha')
        {
            $qb = $this->createQueryBuilder('g');
            $qb->join('g.rarity','r');
            $qb->andWhere('g.bought = ?1 AND r.marketable = ?2');
            $qb->setParameter(1, 0);
            $qb->setParameter(2, 1);



            if($recherche !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('g.name', ':recherche'),
                        $qb->expr()->like('g.description', ':recherche')
                    )
                );
                $qb->setParameter('recherche', '%'.addcslashes($recherche, '%_').'%');
            } 
            
            if($type !== null){
                $qb->join('g.ingredient_type', 'it');
                $qb->andWhere('it.type LIKE :type');
                $qb->setParameter('type', $type->getType());
            }

            if($effect !== null){
                $qb->andWhere('g.effect LIKE :effect');
                $qb->setParameter('effect', $effect->getEffect());
            }

            if($support !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->eq('g.support', ':support'),
                        $qb->expr()->eq('g.support_2', ':support'),
                        $qb->expr()->eq('g.support_3', ':support')
                    )
                );
                $qb->setParameter('support', $support->getSupport());
            }
            
            //choose order by price or alpha
            if ($order == 'alpha'){
                $qb->orderBy('g.name', 'ASC');
            }else{
                $qb->orderBy('g.price', 'ASC');            
            }
            return $qb->getQuery()->getResult();
        }

        public function searchadmin($recherche=null,$type=null,$effect=null, $support=null, $order='alpha')
        {
            $qb = $this->createQueryBuilder('g');
            $qb->join('g.rarity','r');



            if($recherche !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('g.name', ':recherche'),
                        $qb->expr()->like('g.description', ':recherche')
                    )
                );
                $qb->setParameter('recherche', '%'.addcslashes($recherche, '%_').'%');
            } 
            
            if($type !== null){
                $qb->join('g.ingredient_type', 'it');
                $qb->andWhere('it.type LIKE :type');
                $qb->setParameter('type', $type->getType());
            }

            if($effect !== null){
                $qb->andWhere('g.effect LIKE :effect');
                $qb->setParameter('effect', $effect->getEffect());
            }

            if($support !== null){
                $qb->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->eq('g.support', ':support'),
                        $qb->expr()->eq('g.support_2', ':support'),
                        $qb->expr()->eq('g.support_3', ':support')
                    )
                );
                $qb->setParameter('support', $support->getSupport());
            }
            
            //choose order by price or alpha
            if ($order == 'alpha'){
                $qb->orderBy('g.name', 'ASC');
            }else{
                $qb->orderBy('g.price', 'ASC');            
            }
            return $qb->getQuery()->getResult();
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
