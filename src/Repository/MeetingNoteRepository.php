<?php

namespace App\Repository;

use App\Entity\MeetingNote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MeetingNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeetingNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeetingNote[]    findAll()
 * @method MeetingNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetingNoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeetingNote::class);
    }

    // /**
    //  * @return MeetingNote[] Returns an array of MeetingNote objects
    //  */
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
    public function findOneBySomeField($value): ?MeetingNote
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
