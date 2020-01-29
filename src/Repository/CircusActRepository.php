<?php

namespace App\Repository;

use App\Entity\CircusAct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CircusAct|null find($id, $lockMode = null, $lockVersion = null)
 * @method CircusAct|null findOneBy(array $criteria, array $orderBy = null)
 * @method CircusAct[]    findAll()
 * @method CircusAct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CircusActRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CircusAct::class);
    }

    // /**
    //  * @return CircusAct[] Returns an array of CircusAct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CircusAct
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
