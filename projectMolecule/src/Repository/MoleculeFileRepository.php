<?php

namespace App\Repository;

use App\Entity\MoleculeFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MoleculeFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method MoleculeFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method MoleculeFile[]    findAll()
 * @method MoleculeFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoleculeFileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MoleculeFile::class);
    }

//    /**
//     * @return MoleculeFile[] Returns an array of MoleculeFile objects
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
    public function findOneBySomeField($value): ?MoleculeFile
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
