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
}
