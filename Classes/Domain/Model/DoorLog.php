<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class DoorLog extends AbstractEntity
{
    protected int $door = 0;
    protected int $openedAt = 0;
    protected string $ipAddress = '';
    protected string $userAgent = '';
    protected string $referer = '';

    public function getDoor(): int
    {
        return $this->door;
    }

    public function setDoor(int $door): void
    {
        $this->door = $door;
    }

    public function getOpenedAt(): int
    {
        return $this->openedAt;
    }

    public function setOpenedAt(int $openedAt): void
    {
        $this->openedAt = $openedAt;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    public function getReferer(): string
    {
        return $this->referer;
    }

    public function setReferer(string $referer): void
    {
        $this->referer = $referer;
    }
}
