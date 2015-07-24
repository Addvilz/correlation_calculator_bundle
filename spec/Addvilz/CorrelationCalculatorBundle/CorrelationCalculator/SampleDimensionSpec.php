<?php

namespace spec\Addvilz\CorrelationCalculatorBundle\CorrelationCalculator;

use PhpSpec\ObjectBehavior;

class SampleDimensionSpec extends ObjectBehavior
{
    private $values = [1,2,3];

    public function it_implements_array_access()
    {
        $this->shouldImplement(\ArrayAccess::class);
    }

    public function let()
    {
        $this->beConstructedWith($this->values);
    }

    public function it_holds_values()
    {
        $this->getValues()->shouldBe($this->values);
    }

    public function it_holds_sum_of_values()
    {
        $this->getSumOf()->shouldBe(6);
    }

    public function it_holds_count_of_values()
    {
        $this->getCount()->shouldBe(3);
    }

    public function it_recalculates_met_on_value_addition()
    {
        $this[] = 4;

        $this->getSumOf()->shouldBe(10);
        $this->getCount()->shouldBe(4);
    }

    public function it_recalculates_met_on_value_removal()
    {
        unset($this[2]);

        $this->getSumOf()->shouldBe(3);
        $this->getCount()->shouldBe(2);
    }
}
