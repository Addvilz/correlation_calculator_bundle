<?php

namespace Addvilz\CorrelationCalculatorBundle\CorrelationCalculator;

class SampleValidationException extends \InvalidArgumentException
{
    /**
     * @var \Exception
     */
    private $previous;

    /**
     * @param \Exception $previous
     */
    public function __construct($message, \Exception $previous)
    {
        parent::__construct($message);
        $this->previous = $previous;
    }
}
