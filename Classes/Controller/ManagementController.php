<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use Hamstah\Adventskalender\Domain\Model\Door;
use Hamstah\Adventskalender\Domain\Repository\DoorRepository;

class ManagementController extends ActionController
{
    public function __construct(
        private readonly DoorRepository $doorRepository
    ) {}

    public function indexAction(): ResponseInterface
    {
        $doors = $this->doorRepository->findAll();
        $this->view->assign('doors', $doors);
        return $this->htmlResponse();
    }

    public function editAction(?Door $door = null): ResponseInterface
    {
        if ($door === null) {
            $this->redirect('index');
        }

        $this->view->assign('door', $door);
        return $this->htmlResponse();
    }

    public function updateAction(Door $door): ResponseInterface
    {
        $this->doorRepository->update($door);

        $this->addFlashMessage(
            'Das Türchen wurde erfolgreich aktualisiert.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        $this->redirect('index');
    }

    public function newAction(): ResponseInterface
    {
        $door = new Door();
        $this->view->assign('door', $door);
        return $this->htmlResponse();
    }

    public function createAction(Door $door): ResponseInterface
    {
        $this->doorRepository->add($door);

        $this->addFlashMessage(
            'Das neue Türchen wurde erstellt.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        $this->redirect('index');
    }

    public function deleteAction(Door $door): ResponseInterface
    {
        $this->doorRepository->remove($door);

        $this->addFlashMessage(
            'Das Türchen wurde gelöscht.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        $this->redirect('index');
    }
}
