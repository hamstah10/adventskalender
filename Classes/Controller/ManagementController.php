<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentValueException;
use Hamstah\Adventskalender\Domain\Model\Door;
use Hamstah\Adventskalender\Domain\Model\Voucher;
use Hamstah\Adventskalender\Domain\Repository\DoorRepository;
use Hamstah\Adventskalender\Domain\Repository\VoucherRepository;
use Hamstah\Adventskalender\Domain\Repository\DoorLogRepository;

class ManagementController extends ActionController
{
    public function __construct(
        private readonly DoorRepository $doorRepository,
        private readonly VoucherRepository $voucherRepository,
        private readonly DoorLogRepository $doorLogRepository
    ) {}

    public function initializeCreateVoucherAction(): void
    {
        if ($this->arguments->hasArgument('voucher')) {
            $this->arguments->getArgument('voucher')
                ->getPropertyMappingConfiguration()
                ->allowProperties('headline', 'forName', 'description', 'fromName', 'design', 'door');
        }
    }

    public function initializeUpdateVoucherAction(): void
    {
        if ($this->arguments->hasArgument('voucher')) {
            $this->arguments->getArgument('voucher')
                ->getPropertyMappingConfiguration()
                ->allowProperties('headline', 'forName', 'description', 'fromName', 'design', 'door');
        }
    }

    public function indexAction(): ResponseInterface
    {
        $doors = $this->doorRepository->findAll();
        $this->view->assign('doors', $doors);
        return $this->htmlResponse();
    }

    public function editAction(?Door $door = null): ResponseInterface
    {
        if ($door === null) {
            return $this->redirect('index');
        }

        $vouchers = $this->voucherRepository->findAll();
        $this->view->assign('door', $door);
        $this->view->assign('vouchers', $vouchers);
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

        return $this->redirect('index');
    }

    public function newAction(): ResponseInterface
    {
        $door = new Door();
        $vouchers = $this->voucherRepository->findAll();
        $this->view->assign('door', $door);
        $this->view->assign('vouchers', $vouchers);
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

        return $this->redirect('index');
    }

    public function deleteAction(Door $door): ResponseInterface
    {
        $this->doorRepository->remove($door);

        $this->addFlashMessage(
            'Das Türchen wurde gelöscht.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        return $this->redirect('index');
    }

    public function vouchersAction(): ResponseInterface
    {
        $vouchers = $this->voucherRepository->findAll();
        $this->view->assign('vouchers', $vouchers);
        return $this->htmlResponse();
    }

    public function editVoucherAction(?Voucher $voucher = null): ResponseInterface
    {
        if ($voucher === null) {
            return $this->redirect('vouchers');
        }

        $allDoors = $this->doorRepository->findAll();
        // Filtere Doors: ohne Gutschein ODER mit dem aktuellen Gutschein des Vouchers
        $doorsForSelection = [];
        foreach ($allDoors as $door) {
            if ($door->getVoucher() === null || ($door->getVoucher() && $door->getVoucher()->getUid() === $voucher->getUid())) {
                $doorsForSelection[] = $door;
            }
        }
        $this->view->assign('voucher', $voucher);
        $this->view->assign('doors', $doorsForSelection);
        return $this->htmlResponse();
    }

    public function updateVoucherAction(Voucher $voucher): ResponseInterface
    {
        $this->voucherRepository->update($voucher);

        $this->addFlashMessage(
            'Der Gutschein wurde erfolgreich aktualisiert.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        return $this->redirect('vouchers');
    }

    public function newVoucherAction(): ResponseInterface
    {
        $voucher = new Voucher();
        $allDoors = $this->doorRepository->findAll();
        // Filtere nur Doors ohne Gutschein
        $doorsWithoutVoucher = [];
        foreach ($allDoors as $door) {
            if ($door->getVoucher() === null) {
                $doorsWithoutVoucher[] = $door;
            }
        }
        $this->view->assign('voucher', $voucher);
        $this->view->assign('doors', $doorsWithoutVoucher);
        return $this->htmlResponse();
    }

    public function createVoucherAction(Voucher $voucher): ResponseInterface
    {
        $this->voucherRepository->add($voucher);

        $this->addFlashMessage(
            'Der neue Gutschein wurde erstellt.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        return $this->redirect('vouchers');
    }

    public function deleteVoucherAction(Voucher $voucher): ResponseInterface
    {
        $this->voucherRepository->remove($voucher);

        $this->addFlashMessage(
            'Der Gutschein wurde gelöscht.',
            'Erfolg',
            ContextualFeedbackSeverity::OK
        );

        return $this->redirect('vouchers');
    }

    public function logsAction(): ResponseInterface
    {
        $logs = $this->doorLogRepository->findAll();
        $doors = $this->doorRepository->findAll();
        $this->view->assign('logs', $logs);
        $this->view->assign('doors', $doors);
        return $this->htmlResponse();
    }

    public function doorLogsAction(?Door $door = null): ResponseInterface
    {
        if ($door === null) {
            return $this->redirect('logs');
        }

        $logs = $this->doorLogRepository->findByDoor($door->getUid());
        $this->view->assign('door', $door);
        $this->view->assign('logs', $logs);
        return $this->htmlResponse();
    }
}
