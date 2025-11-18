<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Hamstah\Adventskalender\Domain\Repository\DoorRepository;

class AdventskalenderController extends ActionController
{
    public function __construct(
        private readonly DoorRepository $doorRepository
    ) {}

    public function listAction(): ResponseInterface
    {
        $doors = $this->doorRepository->findAll();
        $this->view->assign('doors', $doors);
        return $this->htmlResponse();
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

        $this->view->assign('door', $doorObject);
        return $this->htmlResponse();
    }
}
