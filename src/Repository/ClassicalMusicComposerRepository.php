<?php

namespace App\Repository;

use App\Entity\ClassicalMusicComposer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassicalMusicComposer|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassicalMusicComposer|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassicalMusicComposer[]    findAll()
 * @method ClassicalMusicComposer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassicalMusicComposerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassicalMusicComposer::class);
    }

    // /**
    //  * @return ClassicalMusicComposer[] Returns an array of ClassicalMusicComposer objects
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
    public function findOneBySomeField($value): ?ClassicalMusicComposer
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
