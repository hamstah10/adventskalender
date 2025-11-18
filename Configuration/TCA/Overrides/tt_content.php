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

ExtensionUtility::registerPlugin(
    'Adventskalender',
    'Management',
    'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:plugin.management.title',
    'EXT:adventskalender/Resources/Public/Icons/Extension.svg'
);

$managementPluginSignature = 'adventskalender_management';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$managementPluginSignature] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$managementPluginSignature] = 'recursive,select_key';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $managementPluginSignature,
    'FILE:EXT:adventskalender/Configuration/FlexForms/ManagementSettings.xml'
);
