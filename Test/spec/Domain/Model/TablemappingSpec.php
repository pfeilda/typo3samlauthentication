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

namespace spec\DanielPfeil\Samlauthentication\Domain\Model;

use DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use PhpSpec\ObjectBehavior;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class TablemappingSpec extends ObjectBehavior
{
    final public function it_is_initialisable()
    {
        $this->shouldBeAnInstanceOf(Tablemapping::class);
        $this->shouldBeAnInstanceOf(AbstractEntity::class);
    }

    final public function its_field_correct_initialised()
    {
        $this->getFields()->count()->shouldBe(0);
    }

    final public function its_get_field()
    {
        $this->getFields()->shouldBeAnInstanceOf(ObjectStorage::class);
    }

    final public function its_set_fields()
    {
        $fieldMapping = new Fieldmapping();

        $objectStorage = new ObjectStorage();
        $objectStorage->attach($fieldMapping);

        $this->setFields($objectStorage);
        $this->getFields()->shouldBe($objectStorage);
    }

    final public function its_get_table_initial()
    {
        $this->getTable()->shouldBe("");
    }

    final public function its_set_table()
    {
        $tablename = "test";

        $this->setTable($tablename);
        $this->getTable()->shouldBe($tablename);
    }

    final public function its_set_table_fails_with_null()
    {
        $this->shouldThrow(\TypeError::class)->duringSetTable(null);
        $this->getTable()->shouldBe("");
    }

    final public function its_get_table()
    {
        $tablename = "test";

        $this->setTable($tablename);
        $this->getTable()->shouldBe($tablename);
    }

    final public function it_is_set_hidden_false()
    {
        $this->setHidden(false);
        $this->isHidden()->shouldBe(false);
    }

    final public function it_is_set_hidden_true()
    {
        $this->setHidden(true);
        $this->isHidden()->shouldBe(true);
    }

    final public function it_is_hidden_initial()
    {
        $this->isHidden()->shouldBe(false);
    }

    final public function it_is_hidden_true()
    {
        $this->setHidden(true);
        $this->isHidden()->shouldBe(true);
    }

    final public function it_is_hidden_false()
    {
        $this->setHidden(false);
        $this->isHidden()->shouldBe(false);
    }

    final public function it_is_set_uid_correct()
    {
        $uid = 1;
        $this->setUid($uid);
        $this->getUid()->shouldBe($uid);
    }

    final public function it_is_set_uid_to_low()
    {
        $uid = 0;
        $this->setUid($uid);
        $this->getUid()->shouldBeNull();
    }

    final public function it_is_set_uid_twice()
    {
        $uid = 1;
        $this->setUid($uid);
        $this->setUid(10);
        $this->getUid()->shouldBe($uid);
    }

    final public function it_is_set_uid_twice_zero()
    {
        $uid = 1;
        $this->setUid($uid);
        $this->setUid(0);
        $this->getUid()->shouldBe($uid);
    }

    final public function it_is_get_uid_initial()
    {
        $this->getUid()->shouldBeNull();
    }

    final public function it_is_set_uid()
    {
        $uid = 10;
        $this->setUid($uid);
        $this->getUid()->shouldBe(10);
    }

    final public function it_is_add_field_null()
    {
        $this->shouldThrow(\TypeError::class)->duringAddField(null);
    }

    final public function it_is_add_field()
    {
        $fieldMapping = new Fieldmapping();

        $this->addField($fieldMapping);
        $this->getFields()->contains($fieldMapping)->shouldBe(true);
    }

    final public function it_is_remove_field_null()
    {
        $this->shouldThrow(\TypeError::class)->duringRemoveField(null);
    }

    final public function it_is_remove_field()
    {
        $fieldMapping = new Fieldmapping();

        $this->addField($fieldMapping);
        $this->removeField($fieldMapping);
        $this->getFields()->contains($fieldMapping)->shouldBe(false);
    }
}