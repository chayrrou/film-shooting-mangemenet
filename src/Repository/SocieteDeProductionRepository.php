<?php

namespace App\Repository;

use App\Entity\SocieteDeProduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SocieteDeProduction>
 *
 * @method SocieteDeProduction|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocieteDeProduction|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocieteDeProduction[]    findAll()
 * @method SocieteDeProduction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocieteDeProductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocieteDeProduction::class);
    }

    public function save(SocieteDeProduction $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SocieteDeProduction $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SocieteDeProduction[] Returns an array of SocieteDeProduction objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SocieteDeProduction
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
