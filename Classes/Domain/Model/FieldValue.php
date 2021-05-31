<?php
/**
 * Copyright (C) 2018  Daniel Pfeil <daniel.pfeil@itpfeil.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace DanielPfeil\Samlauthentication\Domain\Model;

class FieldValue
{
    /**
     * @var string|null
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
     * @var boolean
     */
    private $noForeignField;

    /**
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
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
    public function setField(string $field)
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
    public function setForeignField(string $foreignField)
    {
        $this->foreignField = $foreignField;
    }

    /**
     * @return bool
     */
    public function isNoForeignField(): bool
    {
        return $this->noForeignField;
    }

    /**
     * @param bool $noForeignField
     */
    public function setNoForeignField(bool $noForeignField): void
    {
        $this->noForeignField = $noForeignField;
    }

}
