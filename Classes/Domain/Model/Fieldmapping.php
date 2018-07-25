<?php


namespace DanielPfeil\Samlauthentication\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Fieldmapping extends AbstractEntity
{
    /**
     * @var bool
     */
    protected $hidden = false;
    /**
     * @var string
     */
    protected $field = "";
    /**
     * @var string
     */
    protected $foreignfield = "";
    /**
     * @var boolean
     */
    protected $identifier = false;

    /**
     * @param int $uid
     */
    public function setUid(int $uid)
    {
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
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField(string $field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getForeignfield(): string
    {
        return $this->foreignfield;
    }

    /**
     * @param string $foreignfield
     */
    public function setForeignfield(string $foreignfield)
    {
        $this->foreignfield = $foreignfield;
    }

    /**
     * @return bool
     */
    public function isIdentifier(): bool
    {
        return $this->identifier;
    }

    /**
     * @param bool $identifier
     */
    public function setIdentifier(bool $identifier): void
    {
        $this->identifier = $identifier;
    }
}
