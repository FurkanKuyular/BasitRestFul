<?php

namespace App\Repository;

use App\Entity\Burak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Burak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Burak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Burak[]    findAll()
 * @method Burak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BurakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Burak::class);
    }

    // /**
    //  * @return Burak[] Returns an array of Burak objects
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
    public function findOneBySomeField($value): ?Burak
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
