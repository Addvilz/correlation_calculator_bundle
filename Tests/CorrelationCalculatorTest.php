<?php

namespace Tests;

use Addvilz\CorrelationCalculatorBundle\CorrelationCalculator\CorrelationCalculator;
use Addvilz\CorrelationCalculatorBundle\CorrelationCalculator\SampleCollection;

class CorrelationCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Integration test for CorrelationCalculator.
     *
     * @test
     * @group correlation_calculator
     */
    public function it_calculates_result()
    {
        $x = [43, 21, 25, 42, 57, 59];
        $y = [99, 65, 79, 75, 87, 81];

        $sampleCollection = new SampleCollection($x, $y);

        $calculator = new CorrelationCalculator();

        $result = $calculator->calculateCoefficient($sampleCollection);

        $this->assertEquals(0.52980890189017, $result);
    }
}
