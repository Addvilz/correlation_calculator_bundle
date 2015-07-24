<?php

namespace Addvilz\CorrelationCalculatorBundle\CorrelationCalculator;

class SampleDimension implements \ArrayAccess
{
    /**
     * @var array
     */
    private $values;

    /**
     * @var int
     */
    private $sumOf;

    /**
     * @var int
     */
    private $count;

    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
        $this->precalculateMeta();
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return int
     */
    public function getSumOf()
    {
        return $this->sumOf;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
        $this->precalculateMeta();
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->values[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->values[$offset]);
        $this->precalculateMeta();
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->values[$offset]) ? $this->values[$offset] : null;
    }

    /**
     * It is less expensive to pre-calculate this on edit than on read.
     */
    private function precalculateMeta()
    {
        $this->count = count($this->values);
        $this->sumOf = array_sum($this->values);
    }
}
