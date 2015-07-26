CorrelationCalculatorBundle
================

This bundle provides simple implementation of [Pearson product-moment correlation coefficient calculator](https://en.wikipedia.org/wiki/Pearson_product-moment_correlation_coefficient).

It can be used to calculate correlation coefficient between two samples of data (X and Y).

The resulting correlation coefficient ranges from −1 to 1. A value of 1 implies that a linear equation describes the relationship between X and Y perfectly, with all data points lying on a line for which Y increases as X increases. A value of −1 implies that all data points lie on a line for which Y decreases as X increases. A value of 0 implies that there is no linear correlation between the variables.

## Installation

`composer require addvilz/correlation_calculator_bundle`

## Sample usage

### Symfony2 service

Bundle exposes service `addvilz_correlation_calculator.correlation_calculator`, an instance of `CorrelationCalculator`.

You can use it like this:

```
    services:
        myvendor.bundle.some_class:
            class: MyClass
            arguments:
                @addvilz_correlation_calculator.correlation_calculator
```


```
    class MyClass
    {
        private $correlationCalculator;

        function __construct(CorrelactionCalculator $correlationCalculator)
        {
            $this->correlationCalculator = $correlationCalculator;
        }

        function doStuff(array $x, array $y)
        {
            $this->correlationCalculator->calculateCoefficient(new SampleCollection($x, $y));
        }
    }
```

### Standalone
```
<?php
$sampleCollection = new SampleCollection([1, 2, 3], [4, 5, 6]);
$calculator = new CorrelationCalculator();
$result = $calculator->calculateCoefficient($sampleCollection); // 1.0
```

## License
Licensed under terms and conditions of Apache 2.0 license.