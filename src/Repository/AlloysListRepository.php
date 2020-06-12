<?php

namespace App\Repository;

use App\Entity\AlloysList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AlloysList|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlloysList|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlloysList[]    findAll()
 * @method AlloysList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlloysListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlloysList::class);
    }

    public function search($recherche=null,$type=null,$support=null, $order='alpha')
    {
        $qb = $this->createQueryBuilder('a');   

        if($recherche !== null){
            $qb->andWhere(
                $qb->expr()->orX(
                    $qb->expr()->like('a.name', ':recherche'),
                    $qb->expr()->like('a.description', ':recherche')
                )
            );
            echo "name";
            $qb->setParameter('recherche', '%'.addcslashes($recherche, '%_').'%');
        } 

        if($support !== null){
            $qb->andWhere(
                $qb->expr()->orX(
                    $qb->expr()->eq('a.support', ':support'),
                    $qb->expr()->eq('a.support_2', ':support'),
                    $qb->expr()->eq('a.support_3', ':support')
                )
            );
            $qb->setParameter('support', $support);
        }

        if($type !== null){
            $qb->andWhere('a.type LIKE :type');
            $qb->setParameter('type', $type);
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
    //  * @return AlloysList[] Returns an array of AlloysList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AlloysList
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
