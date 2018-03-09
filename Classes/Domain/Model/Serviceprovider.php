<?php

namespace DanielPfeil\Samlauthentication\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

//todo add aditional fields defined in tables.sql
class Serviceprovider extends AbstractEntity
{
    /**
     * @var bool
     */
    protected $hidden = false;
    /**
     * @var string
     */
    protected $title = "";
    /**
     * @var string
     */
    protected $identityprovider = "";
    /**
     * @var int
     */
    protected $destinationpid = -1;
    /**
     * @var integer
     */
    protected $type = 1;
    /**
     * @var integer
     */
    protected $context = 0;
    /**
     * @var string
     */
    protected $prefix = "";
    /**
     * @var ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Tablemapping>
     */
    protected $tablemapping = null;

    public function __construct()
    {
        $this->setTablemapping(new ObjectStorage());
    }

    /**
     * @param int $uid
     */
    public function setUid(int $uid){
        if (!$this->uid) {
            $this->uid = $uid;
        }
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
    public function setHidden(bool $hidden)
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
    public function setTitle(string $title)
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
    public function setIdentityprovider(string $identityprovider)
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
    public function setDestinationpid(int $destinationpid)
    {
        $this->destinationpid = $destinationpid;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getContext(): int
    {
        return $this->context;
    }

    /**
     * @param int $context
     */
    public function setContext(int $context)
    {
        $this->context = $context;
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
    public function setPrefix(string $prefix)
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
    public function setTablemapping(ObjectStorage $tablemapping)
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
