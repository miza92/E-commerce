<?php

namespace App\Repository;

use App\Entity\PictureProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PictureProduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureProduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureProduit[]    findAll()
 * @method PictureProduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureProduitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PictureProduit::class);
    }

    // /**
    //  * @return PictureProduit[] Returns an array of PictureProduit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PictureProduit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
