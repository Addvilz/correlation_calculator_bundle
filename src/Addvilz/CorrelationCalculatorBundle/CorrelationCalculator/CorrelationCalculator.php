<?php

namespace Addvilz\CorrelationCalculatorBundle\CorrelationCalculator;

class CorrelationCalculator
{
    /**
     * @param SampleCollection $sampleCollection
     *
     * @return float
     */
    public function calculateCoefficient(SampleCollection $sampleCollection)
    {
        $x = $sampleCollection->getX();
        $y = $sampleCollection->getY();

        $x2 = new SampleDimension([]);
        $y2 = new SampleDimension([]);

        $xy = new SampleDimension([]);

        for ($i = 0; $i < $sampleCollection->getSampleCount(); $i++) {
            $xy[] = $sampleCollection->getX()[$i] * $sampleCollection->getY()[$i];

            $x2[] = pow($sampleCollection->getX()[$i], 2);
            $y2[] = pow($sampleCollection->getY()[$i], 2);
        }

        $sub = ($sampleCollection->getSampleCount() * $xy->getSumOf()) - ($x->getSumOf() * $y->getSumOf());

        $diff1 = $this->calculateDiff($sampleCollection->getSampleCount(), $x->getSumOf(), $x2->getSumOf());

        $diff2 = $this->calculateDiff($sampleCollection->getSampleCount(), $y->getSumOf(), $y2->getSumOf());

        return ($sub / (sqrt($diff1 * $diff2)));
    }

    /**
     * @param int $sampleCount
     * @param int $sumOfDimension
     * @param int $sumOfDimensionSq
     *
     * @return float|int
     */
    private function calculateDiff($sampleCount, $sumOfDimension, $sumOfDimensionSq)
    {
        return ($sampleCount * $sumOfDimensionSq) -  pow($sumOfDimension, 2);
    }
}
