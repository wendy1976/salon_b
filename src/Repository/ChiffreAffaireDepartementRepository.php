<?php

namespace App\Repository;

use App\Entity\ChiffreAffaireDepartement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChiffreAffaireDepartement>
 *
 * @method ChiffreAffaireDepartement|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChiffreAffaireDepartement|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChiffreAffaireDepartement[]    findAll()
 * @method ChiffreAffaireDepartement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChiffreAffaireDepartementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChiffreAffaireDepartement::class);
    }

//    /**
//     * @return ChiffreAffaireDepartement[] Returns an array of ChiffreAffaireDepartement objects
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

//    public function findOneBySomeField($value): ?ChiffreAffaireDepartement
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
