<?php

/**
 * PHP version 5
 *
 * @category Repository
 * @package  Core
 * @author   Maxence Perrin <mperrin@darkmira.fr>
 * @license  Darkmira <darkmira@darkmira.fr>
 * @link     www.darkmira.fr
 */

namespace ZCEPracticeTest\Core\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 * @category Repository
 * @package  Core
 * @author   Maxence Perrin <mperrin@darkmira.fr>
 * @license  Darkmira <darkmira@darkmira.fr>
 * @link     www.darkmira.fr
 */
class QuestionRepository extends EntityRepository
{
    public function getAll()
    {
        $q = $this->createQueryBuilder('q');
        
        $q
            ->addSelect('t, qc')
            ->leftJoin('q.topic', 't')
            ->leftJoin('q.questionQCMChoices', 'qc')
        ;
        
        return $q->getQuery()->getResult();
    }
}
