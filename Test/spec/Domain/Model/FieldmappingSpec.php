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

/**
 * Created by PhpStorm.
 * User: pfeilda
 * Date: 07.07.18
 * Time: 14:34
 */

namespace spec\DanielPfeil\Samlauthentication\Domain\Model;

use DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping;
use PhpSpec\ObjectBehavior;

class FieldmappingSpec extends ObjectBehavior
{

    final public function it_is_initializable()
    {
        $this->shouldHaveType(Fieldmapping::class);
    }

    final public function it_is_set_identifier_false()
    {
        $this->setIdentifier(false);
        $this->isIdentifier()->shouldBe(false);
    }

    final public function it_is_set_identifier_true()
    {
        $this->setIdentifier(true);
        $this->isIdentifier()->shouldBe(true);
    }

    final public function it_is_identifier_initial()
    {
        $this->isIdentifier()->shouldBe(false);
    }


    final public function it_is_identifier_true()
    {
        $this->setIdentifier(true);
        $this->isIdentifier()->shouldBe(true);
    }

    final public function it_is_identifier_false()
    {
        $this->setIdentifier(false);
        $this->isIdentifier()->shouldBe(false);
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

    final public function it_is_get_field_initial()
    {
        $this->getField()->shouldBe("");
    }

    final public function it_is_get_field()
    {
        $test = "test";
        $this->setField($test);
        $this->getField()->shouldBe($test);
    }

    final public function it_is_set_field()
    {
        $test = "test";
        $this->setField($test);
        $this->getField()->shouldBe($test);
    }

    final public function it_is_get_foreign_field_initial()
    {
        $this->getForeignfield()->shouldBe("");
    }

    final public function it_is_get_foreign_field()
    {
        $test = "test";
        $this->setForeignfield($test);
        $this->getForeignfield()->shouldBe($test);
    }

    final public function it_is_set_foreign_field()
    {
        $test = "test";
        $this->setForeignfield($test);
        $this->getForeignfield()->shouldBe($test);
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
}
