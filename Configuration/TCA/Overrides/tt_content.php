<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin(
    'Adventskalender',
    'Calendar',
    'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:plugin.calendar.title',
    'EXT:adventskalender/Resources/Public/Icons/Extension.svg'
);

$pluginSignature = 'adventskalender_calendar';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,select_key';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:adventskalender/Configuration/FlexForms/PluginSettings.xml'
);
