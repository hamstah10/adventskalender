<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Hooks;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Http\ApplicationType;

class PageRendererHook
{
    public function addAssets(array $params, PageRenderer $pageRenderer): void
    {
        if (($GLOBALS['TYPO3_REQUEST'] ?? null) instanceof \Psr\Http\Message\ServerRequestInterface
            && ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isFrontend()
        ) {
            $pageRenderer->addCssFile('EXT:adventskalender/Resources/Public/Css/adventskalender.css');
            $pageRenderer->addJsFooterFile('EXT:adventskalender/Resources/Public/JavaScript/adventskalender.js');
        }
    }
}
