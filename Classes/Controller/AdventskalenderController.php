<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use Hamstah\Adventskalender\Domain\Repository\DoorRepository;
use Hamstah\Adventskalender\Domain\Repository\DoorLogRepository;
use Hamstah\Adventskalender\Domain\Model\DoorLog;

class AdventskalenderController extends ActionController
{
    private const DOOR_ORDER = [12, 5, 18, 1, 21, 9, 15, 3, 24, 7, 14, 20, 2, 16, 11, 6, 23, 8, 19, 4, 13, 10, 22, 17];

    public function __construct(
        private readonly DoorRepository $doorRepository,
        private readonly DoorLogRepository $doorLogRepository,
        private readonly PersistenceManager $persistenceManager
    ) {}

    public function listAction(): ResponseInterface
    {
        $doors = $this->doorRepository->findAll();
        $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Berlin'));
        $currentDay = (int)$currentDate->format('d');
        $currentMonth = (int)$currentDate->format('m');
        
        // Sort doors according to DOOR_ORDER
        $sortedDoors = $this->sortDoorsByOrder($doors);
        
        $this->view->assign('doors', $sortedDoors);
        $this->view->assign('currentDay', $currentDay);
        $this->view->assign('currentMonth', $currentMonth);
        return $this->htmlResponse();
    }

    private function sortDoorsByOrder($doors): array
    {
        $sorted = [];
        foreach (self::DOOR_ORDER as $dayNumber) {
            foreach ($doors as $door) {
                if ((int)$door->getDay() === $dayNumber) {
                    $sorted[] = $door;
                    break;
                }
            }
        }
        return $sorted;
    }

    public function showAction(int $door): ResponseInterface
    {
        $doorObject = $this->doorRepository->findByUid($door);

        if ($doorObject === null) {
            return $this->redirect('list');
        }

        if (!$doorObject->isUnlocked()) {
            $this->addFlashMessage(
                'Dieses Türchen kann noch nicht geöffnet werden.',
                'Zu früh!',
                \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::WARNING
            );
            return $this->redirect('list');
        }

        // Log door opening
        $this->logDoorOpening($door);

        $this->view->assign('door', $doorObject);
        return $this->htmlResponse();
    }

    private function logDoorOpening(int $doorUid): void
    {
        $doorLog = new DoorLog();
        $doorLog->setDoor($doorUid);
        $doorLog->setOpenedAt((int)time());
        $doorLog->setIpAddress($this->getClientIpAddress());
        $doorLog->setUserAgent($_SERVER['HTTP_USER_AGENT'] ?? '');
        $doorLog->setReferer($_SERVER['HTTP_REFERER'] ?? '');

        $this->doorLogRepository->add($doorLog);
        $this->persistenceManager->persistAll();
    }

    private function getClientIpAddress(): string
    {
        // Check for shared internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        // Check for IP passed from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Handle multiple IPs (take the first one)
            $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($ips[0]);
        }
        // Check the remote address
        elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return '';
    }
}
