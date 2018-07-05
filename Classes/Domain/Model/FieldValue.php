<?php

namespace DanielPfeil\Samlauthentication\Domain\Model;

class FieldValue
{
    /**
     * @var string
     */
    private $value;
    /**
     * @var string
     */
    private $field;
    /**
     * @var string
     */
    private $foreignField;

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
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
    public function setField(string $field): void
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getForeignField(): string
    {
        return $this->foreignField;
    }

    /**
     * @param string $foreignField
     */
    public function setForeignField(string $foreignField): void
    {
        $this->foreignField = $foreignField;
    }
}
