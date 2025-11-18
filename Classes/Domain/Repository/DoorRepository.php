<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class DoorRepository extends Repository
{
    protected $defaultOrderings = [
        'day' => QueryInterface::ORDER_ASCENDING,
    ];

    public function findByDay(int $day): ?object
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('day', $day)
        );
        return $query->execute()->getFirst();
    }

    public function findActive(): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('isActive', true)
        );
        return $query->execute();
    }
}
