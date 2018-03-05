<?php

namespace DanielPfeil\Samlauthentication\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Serviceprovider extends AbstractEntity
{
    /**
     * @var bool
     */
    private $hidden = false;
    /**
     * @var string
     */
    private $title = "";
    /**
     * @var string
     */
    private $identityprovider = "";
    /**
     * @var int
     */
    private $destinationpid = -1;
    /**
     * @var string
     */
    private $prefix = "";
    /**
     * @var ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Tablemapping>
     */
    private $tablemapping = null;

    public function __construct()
    {
        $this->setTablemapping(new ObjectStorage());
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getIdentityprovider(): string
    {
        return $this->identityprovider;
    }

    /**
     * @param string $identityprovider
     */
    public function setIdentityprovider(string $identityprovider): void
    {
        $this->identityprovider = $identityprovider;
    }

    /**
     * @return int
     */
    public function getDestinationpid(): int
    {
        return $this->destinationpid;
    }

    /**
     * @param int $destinationpid
     */
    public function setDestinationpid(int $destinationpid): void
    {
        $this->destinationpid = $destinationpid;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * @return ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Tablemapping>
     */
    public function getTablemapping(): ObjectStorage
    {
        return $this->tablemapping;
    }

    /**
     * @param ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Tablemapping> $tablemapping
     */
    public function setTablemapping(ObjectStorage $tablemapping): void
    {
        $this->tablemapping = $tablemapping;
    }

    /**
     * @param Tablemapping $tablemapping
     */
    public function addTablemapping(Tablemapping $tablemapping){
        $this->tablemapping->attach($tablemapping);
    }

    /**
     * @param Tablemapping $tablemapping
     */
    public function removeTablemapping(Tablemapping $tablemapping)
    {
        $this->tablemapping->detach($tablemapping);
    }
}
