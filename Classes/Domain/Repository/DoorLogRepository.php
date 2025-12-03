<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class DoorLogRepository extends Repository
{
    protected $defaultOrderings = [
        'openedAt' => QueryInterface::ORDER_DESCENDING,
    ];

    public function initializeObject(): void
    {
        // Ensure deleted records are excluded by default
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface $querySettings */
        $querySettings = $this->createQuery()->getQuerySettings();
        $querySettings->setIgnoreEnableFields(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function findByDoor(int $doorUid): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('door', $doorUid)
        );
        return $query->execute();
    }

    public function findByDoorAndDateRange(int $doorUid, int $startTime, int $endTime): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalAnd(
                $query->equals('door', $doorUid),
                $query->greaterThanOrEqual('openedAt', $startTime),
                $query->lessThanOrEqual('openedAt', $endTime)
            )
        );
        return $query->execute();
    }
}
