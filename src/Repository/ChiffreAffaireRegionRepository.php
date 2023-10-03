<?php

namespace App\Repository;

use App\Entity\ChiffreAffaireRegion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChiffreAffaireRegion>
 *
 * @method ChiffreAffaireRegion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChiffreAffaireRegion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChiffreAffaireRegion[]    findAll()
 * @method ChiffreAffaireRegion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChiffreAffaireRegionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChiffreAffaireRegion::class);
    }

//    /**
//     * @return ChiffreAffaireRegion[] Returns an array of ChiffreAffaireRegion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ChiffreAffaireRegion
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
