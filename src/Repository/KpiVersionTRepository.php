<?php

namespace App\Repository;

use App\Entity\KpiVersionT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KpiVersionT|null find($id, $lockMode = null, $lockVersion = null)
 * @method KpiVersionT|null findOneBy(array $criteria, array $orderBy = null)
 * @method KpiVersionT[]    findAll()
 * @method KpiVersionT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KpiVersionTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KpiVersionT::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(KpiVersionT $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(KpiVersionT $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return KpiVersionT[] Returns an array of KpiVersionT objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KpiVersionT
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
