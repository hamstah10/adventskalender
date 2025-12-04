<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Hamstah\Adventskalender\Domain\Repository\DoorRepository;

class OverviewController extends ActionController
{
    public function __construct(
        private readonly DoorRepository $doorRepository
    ) {}

    public function indexAction(): ResponseInterface
    {
        $displayMode = $this->settings['displayMode'] ?? 'list';
        
        if ($displayMode === 'grid') {
            return $this->gridAction();
        }

        return $this->listAction();
    }

    public function listAction(): ResponseInterface
    {
        $doorsQuery = $this->doorRepository->findAll();
        $doors = $doorsQuery->toArray();
        $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Berlin'));
        $currentDay = (int)$currentDate->format('d');
        $currentMonth = (int)$currentDate->format('m');

        // Filter only unlocked doors (those that have been released)
        $unlockedDoors = array_filter($doors, function ($door) use ($currentMonth, $currentDay) {
            return $currentMonth === 12 && $door->getDay() <= $currentDay;
        });

        // Sort by day ascending
        usort($unlockedDoors, function ($a, $b) {
            return (int)$a->getDay() <=> (int)$b->getDay();
        });

        $this->view->assign('doors', $unlockedDoors);
        $this->view->assign('unlockedCount', count($unlockedDoors));
        $this->view->assign('totalCount', count($doors));
        $this->view->assign('currentDay', $currentDay);
        $this->view->assign('currentMonth', $currentMonth);

        return $this->htmlResponse();
    }

    public function gridAction(): ResponseInterface
    {
        $doorsQuery = $this->doorRepository->findAll();
        $doors = $doorsQuery->toArray();
        $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Berlin'));
        $currentDay = (int)$currentDate->format('d');
        $currentMonth = (int)$currentDate->format('m');

        // Filter only unlocked doors
        $unlockedDoors = array_filter($doors, function ($door) use ($currentMonth, $currentDay) {
            return $currentMonth === 12 && $door->getDay() <= $currentDay;
        });

        // Sort by day ascending
        usort($unlockedDoors, function ($a, $b) {
            return (int)$a->getDay() <=> (int)$b->getDay();
        });

        $this->view->assign('doors', $unlockedDoors);
        $this->view->assign('unlockedCount', count($unlockedDoors));
        $this->view->assign('totalCount', count($doors));
        $this->view->assign('currentDay', $currentDay);
        $this->view->assign('currentMonth', $currentMonth);

        return $this->htmlResponse();
    }
}
