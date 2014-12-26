<?php

/**
 *
 * PHP version 5
 *
 * @category Repository
 * @package  FrontBundle
 * @author   Maxence Perrin <mperrin@darkmira.fr>
 * @license  Darkmira <darkmira@darkmira.fr>
 * @link     www.darkmira.fr
 *
 */

namespace ZCEPracticeTest\Core\Repository;

use Doctrine\ORM\EntityRepository;

/**
 *
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 * @category Repository
 * @package  FrontBundle
 * @author   Maxence Perrin <mperrin@darkmira.fr>
 * @license  Darkmira <darkmira@darkmira.fr>
 * @link     www.darkmira.fr
 */
class SessionRepository extends EntityRepository
{
    public function getFullSession($sessionId, $userId)
    {
        $q = $this->createQueryBuilder('s')
            ->addSelect('u, q')
            ->leftJoin('s.user', 'u')
            ->leftJoin('s.quiz', 'q')
            ->where('s.id = :sessionId')
            ->andWhere('u.id = :userId')
            ->setParameters(array(
                ':sessionId' => $sessionId,
                ':userId' => $userId,
            ))
        ;
        
        return $q->getQuery()->getOneOrNullResult();
    }
}