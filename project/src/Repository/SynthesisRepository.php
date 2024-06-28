<?php

namespace App\Repository;

use App\Entity\Synthesis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * @extends ServiceEntityRepository<Synthesis>
 */
class SynthesisRepository extends ServiceEntityRepository
{

  private $security;

  public function __construct(ManagerRegistry $registry, Security $security)
  {
    parent::__construct($registry, Synthesis::class);
    $this->security = $security;
  }

  //    /**
  //     * @return Synthesis[] Returns an array of Synthesis objects
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

  //    public function findOneBySomeField($value): ?Synthesis
  //    {
  //        return $this->createQueryBuilder('s')
  //            ->andWhere('s.exampleField = :val')
  //            ->setParameter('val', $value)
  //            ->getQuery()
  //            ->getOneOrNullResult()
  //        ;
  //    }

  /**
   * @return Synthesis[] Returns an array of Synthesis objects
   */
  public function findByUser(): array
  {
    /** @var \App\Entity\Company|null $company */
    $company = $this->security->getUser();
    $id = $company->getId();

    return $this->createQueryBuilder('s')
      ->andWhere('s.company = :company_id')
      ->setParameter('company_id', $id)
      ->getQuery()
      ->getResult();
  }
}
