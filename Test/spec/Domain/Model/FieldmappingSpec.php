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

    final public function testSetIdentifier()
    {

    }

    final public function testSetHidden()
    {

    }

    final public function testGetField()
    {

    }

    final public function testIsIdentifier()
    {

    }

    final public function testSetField()
    {

    }

    final public function testIsHidden()
    {

    }

    final public function testSetForeignfield()
    {

    }

    final public function testGetForeignfield()
    {

    }

    final public function testSetUid()
    {

    }
}
