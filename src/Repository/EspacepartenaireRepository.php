<?php

namespace App\Repository;

use App\Entity\Espacepartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Espacepartenaire>
 *
 * @method Espacepartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Espacepartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Espacepartenaire[]    findAll()
 * @method Espacepartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspacepartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Espacepartenaire::class);
    }

//    /**
//     * @return Espacepartenaire[] Returns an array of Espacepartenaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Espacepartenaire
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
