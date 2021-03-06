<?php

namespace Yoda\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends \Doctrine\ORM\EntityRepository {

    public function getUpcomingEvents($max = null) {
        $gb = $this->createQueryBuilder('e')
                ->addOrderBy('e.time', 'ASC')
                ->where('e.time > :now')
                ->setParameter('now', new \DateTime());

        if ($max) {
            $gb->setMaxResults($max);
        }

        return $gb->getQuery()->execute();
    }

//    /**
//     * @return Event[]
//     */
    public function getRecentlyUpdatedEvents()
    {
        return $this->createQueryBuilder('e')
                ->andWhere('e.createdAt > :since')
                ->setParameter('since', new \DateTime('24 hours ago'))
                ->getQuery()
                ->execute();
    }

}
