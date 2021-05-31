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
     * @var boolean
     */
    protected $noforeignfield = false;
    /**
     * @var string
     */
    protected $foreignfield = "";
    /**
     * @var boolean
     */
    protected $identifier = false;
    /**
     * @var boolean
     */
    protected $fallback = false;
    /**
     * @var string
     */
    protected $defaultvalue = "";

    /**
     * @param $uid
     */
    public function setUid($uid)
    {
        if (!$this->uid && $uid > 0) {
            $this->uid = $uid;
        }
    }

    /**
     * @return int|null
     */
    public function getUid() : ?int
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
     * @return bool
     */
    public function isNoforeignfield(): bool
    {
        return $this->noforeignfield;
    }

    /**
     * @param bool $noforeignfield
     */
    public function setNoforeignfield(bool $noforeignfield): void
    {
        $this->noforeignfield = $noforeignfield;
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
    public function setIdentifier(bool $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return bool
     */
    public function hasFallback(): bool
    {
        return $this->fallback;
    }

    /**
     * @param bool $fallback
     */
    public function setFallback(bool $fallback)
    {
        $this->fallback = $fallback;
    }

    /**
     * @return string
     */
    public function getDefaultvalue(): string
    {
        return $this->defaultvalue;
    }

    /**
     * @param string $defaultvalue
     */
    public function setDefaultvalue(string $defaultvalue)
    {
        $this->defaultvalue = $defaultvalue;
    }
}
