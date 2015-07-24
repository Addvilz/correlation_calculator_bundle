<?php

namespace spec\Addvilz\CorrelationCalculatorBundle\CorrelationCalculator;

use PhpSpec\ObjectBehavior;
use Addvilz\CorrelationCalculatorBundle\CorrelationCalculator\SampleValidationException;

class SampleCollectionSpec extends ObjectBehavior
{
    private $sampleX = [1,2,3];
    private $sampleY = [4,5,6];

    public function let()
    {
        $this->beConstructedWith(
            $this->sampleX,
            $this->sampleY
        );
    }

    public function it_thorws_when_sample_size_not_equal()
    {
        $this->shouldThrow(SampleValidationException::class)->during__construct([1], [1, 2]);
    }

    public function it_holds_valid_sample_count()
    {
        $this->getSampleCount()->shouldBe(3);
    }

    public function it_holds_x()
    {
        $this->getX()->getValues()->shouldBe($this->sampleX);
    }

    public function it_holds_y()
    {
        $this->getY()->getValues()->shouldBe($this->sampleY);
    }
}
