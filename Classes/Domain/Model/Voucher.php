<?php
declare(strict_types=1);

namespace Hamstah\Adventskalender\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Voucher extends AbstractEntity
{
    protected string $headline = '';
    protected string $forName = '';
    protected string $description = '';
    protected string $fromName = '';
    protected string $design = 'classic';

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    public function getForName(): string
    {
        return $this->forName;
    }

    public function setForName(string $forName): void
    {
        $this->forName = $forName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getFromName(): string
    {
        return $this->fromName;
    }

    public function setFromName(string $fromName): void
    {
        $this->fromName = $fromName;
    }

    public function getDesign(): string
    {
        return $this->design;
    }

    public function setDesign(string $design): void
    {
        $this->design = $design;
    }
}
