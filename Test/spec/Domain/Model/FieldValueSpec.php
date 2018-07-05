<?php

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
