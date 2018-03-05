<?php


namespace DanielPfeil\Samlauthentication\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Tablemapping
{
    /**
     * @var bool
     */
    private $hidden = false;

    /**
     * @var string
     */
    private $table = '';

    /**
     * @var ObjectStorage<\DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping>
     */
    private $fields;

    public function __construct()
    {
        $this->setFields(new ObjectStorage());
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
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table): void
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
    public function setFields(ObjectStorage $fields): void
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
