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
     * @var string
     */
    protected $entityid = "";
    /**
     * @var ObjectStorage<Tablemapping>
     */
    protected $tablemapping = null;

    public function __construct()
    {
        $this->setTablemapping(new ObjectStorage());
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
     * @return String
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param String $context
     */
    public function setContext(string $context)
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
     * @param null|string $prefix
     */
    public function setPrefix(?string $prefix)
    {
        if (is_null($prefix)) {
            $prefix = "";
        }
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getEntityid(): string
    {
        return $this->entityid;
    }

    /**
     * @param string $entityid
     */
    public function setEntityid(string $entityid): void
    {
        $this->entityid = $entityid;
    }

    /**
     * @return ObjectStorage<Tablemapping>
     */
    public function getTablemapping(): ObjectStorage
    {
        return $this->tablemapping;
    }

    /**
     * @param ObjectStorage<Tablemapping> $tablemapping
     */
    public function setTablemapping(ObjectStorage $tablemapping)
    {
        $this->tablemapping = $tablemapping;
    }

    /**
     * @param Tablemapping $tablemapping
     */
    public function addTablemapping(Tablemapping $tablemapping)
    {
        $this->tablemapping->attach($tablemapping);
    }

    /**
     * @param Tablemapping $tablemapping
     */
    public function removeTablemapping(Tablemapping $tablemapping)
    {
        $this->tablemapping->detach($tablemapping);
    }

    public function isEqual(Serviceprovider $serviceprovider): bool
    {
        if ($this->uid !== null) {
            return $this->getUid() === $serviceprovider->getUid();
        }
        return false;
    }
}
