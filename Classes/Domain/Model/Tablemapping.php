<?php


namespace DanielPfeil\Samlauthentication\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Tablemapping extends AbstractEntity
{
    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * @var string
     */
    protected $table = '';

    /**
     * @var ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping>
     */
    protected $fields;

    public function __construct()
    {
        $this->setFields(new ObjectStorage());
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
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
    }

    /**
     * @return ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping>
     */
    public function getFields(): ObjectStorage
    {
        return $this->fields;
    }

    /**
     * @param ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping> $fields
     */
    public function setFields(ObjectStorage $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param Fieldmapping $fieldmapping
     */
    public function addField(Fieldmapping $fieldmapping)
    {
        $this->fields->attach($fieldmapping);
    }

    /**
     * @param Fieldmapping $fieldmapping
     */
    public function removeField(Fieldmapping $fieldmapping)
    {
        $this->fields->detach($fieldmapping);
    }
}
