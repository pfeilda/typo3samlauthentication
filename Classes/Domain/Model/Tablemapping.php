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
    public function setUid(int $uid)
    {
        if (!$this->uid && $uid > 0) {
            $this->uid = $uid;
        }
    }

    /**
     * @return int|null
     */
    public function getUid() :?int
    {
        return $this->uid;
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
     * @return ObjectStorage<Fieldmapping>
     */
    public function getFields(): ObjectStorage
    {
        return $this->fields;
    }

    /**
     * @param ObjectStorage<Fieldmapping> $fields
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
