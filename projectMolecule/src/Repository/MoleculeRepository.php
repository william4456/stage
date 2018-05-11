<?php

namespace App\Repository;

use App\Entity\Molecule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Molecule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Molecule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Molecule[]    findAll()
 * @method Molecule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoleculeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Molecule::class);
    }

//    /**
//     * @return Molecule[] Returns an array of Molecule objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Molecule
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
