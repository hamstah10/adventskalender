<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class VoucherRepository extends Repository
{
    protected $defaultOrderings = [
        'crdate' => QueryInterface::ORDER_DESCENDING,
    ];

    public function initializeObject(): void
    {
        // Ensure deleted records are excluded by default
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface $querySettings */
        $querySettings = $this->createQuery()->getQuerySettings();
        $querySettings->setIgnoreEnableFields(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function findByHeadline(string $headline): ?object
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('headline', $headline)
        );
        return $query->execute()->getFirst();
    }

    public function findByDesign(string $design): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('design', $design)
        );
        return $query->execute();
    }

    public function findByDay(int $day): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('day', $day)
        );
        return $query->execute();
    }
}
