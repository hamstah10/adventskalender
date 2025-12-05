<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use Hamstah\Adventskalender\Controller\AdventskalenderController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Page\PageRenderer;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'Adventskalender',
    'Calendar',
    [
        AdventskalenderController::class => 'list, show, logOpen',
    ],
    [
        AdventskalenderController::class => 'show, logOpen',
    ]
);

ExtensionUtility::configurePlugin(
    'Adventskalender',
    'Management',
    [
        \Hamstah\Adventskalender\Controller\ManagementController::class => 'index, edit, update, new, create, delete, vouchers, editVoucher, updateVoucher, newVoucher, createVoucher, deleteVoucher',
    ],
    [
        \Hamstah\Adventskalender\Controller\ManagementController::class => 'update, create, delete, updateVoucher, createVoucher, deleteVoucher',
    ]
);

ExtensionUtility::configurePlugin(
    'Adventskalender',
    'Overview',
    [
        \Hamstah\Adventskalender\Controller\OverviewController::class => 'index, list, grid',
    ],
    []
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] = 
    \Hamstah\Adventskalender\Hooks\PageRendererHook::class . '->addAssets';

// Dashboard Widget CSS
$GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['adventskalender_dashboard'] = 
    'EXT:adventskalender/Resources/Public/Css/dashboard.css';
