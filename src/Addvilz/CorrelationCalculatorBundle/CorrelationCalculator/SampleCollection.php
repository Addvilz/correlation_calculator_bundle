<?php

namespace Addvilz\CorrelationCalculatorBundle\CorrelationCalculator;

/**
 * Collection of correlate-able dimensions.
 * @package Addvilz\CorrelationCalculatorBundle\CorrelationCalculator
 */
class SampleCollection
{
    /**
     * @var SampleDimension
     */
    private $x;

    /**
     * @var SampleDimension
     */
    private $y;

    /**
     * @param array $x
     * @param array $y
     */
    public function __construct(array $x, array $y)
    {
        try {
            $this->validateSamples($x, $y);
        } catch (\InvalidArgumentException $e) {
            throw new SampleValidationException('Provided samples are not valid', $e);
        }

        $this->x = new SampleDimension($x);
        $this->y = new SampleDimension($y);
    }

    /**
     * @return int
     */
    public function getSampleCount()
    {
        return $this->x->getCount();
    }

    /**
     * @return SampleDimension
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return SampleDimension
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param array $x
     * @param array $y
     *
     * @throws \InvalidArgumentException
     */
    private function validateSamples(array $x, array $y)
    {
        if (count($x) !== count($y)) {
            throw new \InvalidArgumentException('X and Y sample count must be equal');
        }
    }
}
