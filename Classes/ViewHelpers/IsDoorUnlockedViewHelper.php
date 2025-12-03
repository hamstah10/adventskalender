<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class IsDoorUnlockedViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function initializeArguments(): void
    {
        $this->registerArgument('day', 'int', 'The door day number (1-24)', true);
    }

    public function render(): bool
    {
        $day = (int)$this->arguments['day'];

        if ($day < 1 || $day > 24) {
            return false;
        }

        $currentDate = new \DateTime();
        $currentDay = (int)$currentDate->format('d');
        $currentMonth = (int)$currentDate->format('m');

        // Only unlock if we're in December
        if ($currentMonth !== 12) {
            return false;
        }

        return $day <= $currentDay;
    }
}
