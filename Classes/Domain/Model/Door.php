<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

class Door extends AbstractEntity
{
    protected int $day = 0;
    protected string $title = '';
    protected string $description = '';
    protected ?FileReference $image = null;
    protected string $content = '';
    protected ?FileReference $video = null;
    protected ?FileReference $audio = null;
    protected string $link = '';
    protected int $isActive = 0;
    protected ?Voucher $voucher = null;
    protected bool $customStyle = false;
    protected string $customColorStart = '';
    protected string $customColorEnd = '';
    protected string $customBorderColor = '';
    protected int $customBorderWidth = 0;

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): ?FileReference
    {
        return $this->image;
    }

    public function setImage(?FileReference $image): void
    {
        $this->image = $image;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getIsActive(): bool
    {
        return (bool)$this->isActive;
    }

    public function isActive(): bool
    {
        return (bool)$this->isActive;
    }

    public function setIsActive(int $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getVideo(): ?FileReference
    {
        return $this->video;
    }

    public function setVideo(?FileReference $video): void
    {
        $this->video = $video;
    }

    public function getAudio(): ?FileReference
    {
        return $this->audio;
    }

    public function setAudio(?FileReference $audio): void
    {
        $this->audio = $audio;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getIsUnlocked(): bool
    {
        return true;
    }

    public function isUnlocked(): bool
    {
        return true;
    }

    public function getVoucher(): ?Voucher
    {
        return $this->voucher;
    }

    public function setVoucher(?Voucher $voucher): void
    {
        $this->voucher = $voucher;
    }

    public function isCustomStyle(): bool
    {
        return $this->customStyle;
    }

    public function setCustomStyle(bool $customStyle): void
    {
        $this->customStyle = $customStyle;
    }

    public function getCustomColorStart(): string
    {
        return $this->customColorStart;
    }

    public function setCustomColorStart(string $customColorStart): void
    {
        $this->customColorStart = $customColorStart;
    }

    public function getCustomColorEnd(): string
    {
        return $this->customColorEnd;
    }

    public function setCustomColorEnd(string $customColorEnd): void
    {
        $this->customColorEnd = $customColorEnd;
    }

    public function getCustomBorderColor(): string
    {
        return $this->customBorderColor;
    }

    public function setCustomBorderColor(string $customBorderColor): void
    {
        $this->customBorderColor = $customBorderColor;
    }

    public function getCustomBorderWidth(): int
    {
        return $this->customBorderWidth;
    }

    public function setCustomBorderWidth(int $customBorderWidth): void
    {
        $this->customBorderWidth = $customBorderWidth;
    }
}
