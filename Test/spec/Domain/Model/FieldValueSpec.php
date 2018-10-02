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

use DanielPfeil\Samlauthentication\Domain\Model\FieldValue;
use PhpSpec\ObjectBehavior;

class FieldValueSpec extends ObjectBehavior
{
    private $fieldValue = "werte";
    private $fieldTitle = "feld Titel";
    private $fieldForeignField = "fremdes Feld";

    final public function it_is_initializable()
    {
        $this->shouldHaveType(FieldValue::class);
    }

    final public function it_is_setter_and_getter_for_value_correct()
    {
        $this->setValue($this->fieldValue);
        $this->getValue()->shouldBeLike($this->fieldValue);
    }

    final public function it_is_setter_and_getter_for_value_fail()
    {
        $this->setValue($this->fieldValue . " fail");
        $this->getValue()->shouldNotBeLike($this->fieldValue);
    }

    final public function it_is_setter_and_getter_for_value_correct_for_null_value()
    {
        $this->setValue(null);
        $this->getValue()->shouldBeLike(null);
    }

    final public function it_is_setter_and_getter_for_field_correct()
    {
        $this->setField($this->fieldTitle);
        $this->getField()->shouldBeLike($this->fieldTitle);
    }

    final public function it_is_setter_and_getter_for_field_fail()
    {
        $this->setField($this->fieldTitle . " fails");
        $this->getField()->shouldNotBeLike($this->fieldTitle);
    }

    final public function it_is_setter_and_getter_for_foreign_field_correct()
    {
        $this->setForeignField($this->fieldForeignField);
        $this->getForeignField()->shouldBeLike($this->fieldForeignField);
    }

    final public function it_is_setter_and_getter_for_foreign_field_fail()
    {
        $this->setForeignField($this->fieldForeignField . " fail");
        $this->getForeignField()->shouldNotBeLike($this->fieldForeignField);
    }
}
