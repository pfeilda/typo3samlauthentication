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

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use PhpSpec\ObjectBehavior;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


class ServiceproviderSpec extends ObjectBehavior
{
    public function it_is_initialisable()
    {
        $this->shouldBeAnInstanceOf(Serviceprovider::class);
        $this->shouldBeAnInstanceOf(AbstractEntity::class);
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

    final public function its_set_title()
    {
        $tablename = "test";

        $this->setTitle($tablename);
        $this->getTitle()->shouldBe($tablename);
    }

    final public function its_set_title_fails_with_null()
    {
        $this->shouldThrow(\TypeError::class)->duringSetTitle(null);
        $this->getTitle()->shouldBe("");
    }

    final public function its_get_title()
    {
        $tablename = "test";

        $this->setTitle($tablename);
        $this->getTitle()->shouldBe($tablename);
    }

    final public function its_get_title_initial()
    {
        $this->getTitle()->shouldBe("");
    }

    final public function its_set_identityprovider()
    {
        $tablename = "test";

        $this->setIdentityprovider($tablename);
        $this->getIdentityprovider()->shouldBe($tablename);
    }

    final public function its_set_identityprovider_fails_with_null()
    {
        $this->shouldThrow(\TypeError::class)->duringSetIdentityprovider(null);
        $this->getIdentityprovider()->shouldBe("");
    }

    final public function its_get_identityprovider()
    {
        $tablename = "test";

        $this->setIdentityprovider($tablename);
        $this->getIdentityprovider()->shouldBe($tablename);
    }

    final public function its_get_identityprovider_initial()
    {
        $this->getIdentityprovider()->shouldBe("");
    }

    final public function its_get_destination_pid_initial()
    {
        $this->getDestinationpid()->shouldBe(-1);
    }

    final public function its_get_destination_pid()
    {
        $value = 10;

        $this->setDestinationpid($value);

        $this->getDestinationpid()->shouldBe($value);
    }

    final public function its_set_destination_pid()
    {
        $value = 10;

        $this->setDestinationpid($value);
        $this->getDestinationpid()->shouldBe($value);
    }

    final public function its_set_null_destination_pid_fails()
    {
        $this->shouldThrow(\TypeError::class)->duringSetDestinationpid(null);
        $this->getDestinationpid()->shouldBe(-1);
    }

    final public function its_set_string_destination_pid_fails()
    {
        $this->shouldThrow(\TypeError::class)->duringSetDestinationpid("test");
        $this->getDestinationpid()->shouldBe(-1);
    }

    final public function its_get_type_initial()
    {
        $this->getType()->shouldBe(1);
    }

    final public function its_get_type()
    {
        $value = 10;

        $this->setType($value);

        $this->getType()->shouldBe($value);
    }

    final public function its_set_type()
    {
        $value = 10;

        $this->setType($value);
        $this->getType()->shouldBe($value);
    }

    final public function its_set_null_type_fails()
    {
        $this->shouldThrow(\TypeError::class)->duringSetType(null);
        $this->getType()->shouldBe(1);
    }

    final public function its_set_string_type_fails()
    {
        $this->shouldThrow(\TypeError::class)->duringSetType("test");
        $this->getType()->shouldBe(1);
    }

    final public function its_set_context()
    {
        $tablename = "test";

        $this->setContext($tablename);
        $this->getContext()->shouldBe($tablename);
    }

    final public function its_set_context_fails_with_null()
    {
        $this->shouldThrow(\TypeError::class)->duringSetTitle(null);
        $this->getContext()->shouldBe("0");
    }

    final public function its_get_context()
    {
        $tablename = "test";

        $this->setContext($tablename);
        $this->getContext()->shouldBe($tablename);
    }

    final public function its_get_context_initial()
    {
        $this->getContext()->shouldBe("0");
    }

    final public function its_set_prefix()
    {
        $tablename = "test";

        $this->setPrefix($tablename);
        $this->getPrefix()->shouldBe($tablename);
    }

    final public function its_set_prefix_fails_with_null()
    {
        $this->shouldThrow(\TypeError::class)->duringSetPrefix(null);
        $this->getPrefix()->shouldBe("");
    }

    final public function its_get_prefix()
    {
        $prefix = "test";

        $this->setPrefix($prefix);
        $this->getPrefix()->shouldBe($prefix);
    }

    final public function its_get_prefix_initial()
    {
        $this->getPrefix()->shouldBe("");
    }

    final public function its_get_tablemapping_datatype_objectstorage()
    {
        $this->getTablemapping()->shouldBeAnInstanceOf(ObjectStorage::class);
    }

    final public function its_get_tablemapping_initial_empty()
    {
        $this->getTablemapping()->count()->shouldBe(0);
    }

    final public function its_throw_type_error_if_set_tablemapping_with_null()
    {
        $this->shouldThrow(\TypeError::class)->duringSetTableMapping(null);
    }

    final public function its_set_tablemapping_correct()
    {
        $objectStorage = new ObjectStorage();

        $this->setTablemapping($objectStorage);
        $this->getTablemapping()->shouldBe($objectStorage);
    }


    final public function it_is_add_tablemapping_null()
    {
        $this->shouldThrow(\TypeError::class)->duringAddTablemapping(null);
    }


    final public function it_is_add_tablemapping()
    {
        $tablemapping = new Tablemapping();

        $this->addTablemapping($tablemapping);
        $this->getTablemapping()->contains($tablemapping)->shouldBe(true);
    }

    final public function it_is_remove_tablemapping_null()
    {
        $this->shouldThrow(\TypeError::class)->duringRemoveTablemapping(null);
    }

    final public function it_is_remove_tablemapping()
    {
        $tablemapping = new Tablemapping();

        $this->addTablemapping($tablemapping);
        $this->removeTablemapping($tablemapping);
        $this->getTablemapping()->contains($tablemapping)->shouldBe(false);
    }

    final public function its_throw_type_error_is_equals_without_parameter()
    {
        $this->shouldThrow(\TypeError::class)->duringIsEqual();
    }

    final public function it_is_equals_false_with_null_as_uid_of_object_and_serviceprovider_which_should_be_compared()
    {
        $serviceProvider = new Serviceprovider();

        $this->isEqual($serviceProvider)->shouldBe(false);
    }

    final public function it_is_equals_false_with_null_as_uid_of_serviceprovider_which_should_be_compared()
    {
        $this->setUid(1);
        $serviceProvider = new Serviceprovider();

        $this->isEqual($serviceProvider)->shouldBe(false);
    }

    final public function it_is_equals_false_with_null_as_uid()
    {
        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(1);

        $this->isEqual($serviceProvider)->shouldBe(false);
    }

    final public function it_is_equals_false_with_different_uids()
    {
        $this->setUid(2);

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(1);

        $this->isEqual($serviceProvider)->shouldBe(false);
    }

    final public function it_is_equals_success()
    {
        $this->setUid(2);

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(2);

        $this->isEqual($serviceProvider)->shouldBe(true);
    }
}
