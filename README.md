CorrelationCalculatorBundle
================

This bundle provides simple implementation of [Pearson product-moment correlation coefficient calculator](https://en.wikipedia.org/wiki/Pearson_product-moment_correlation_coefficient).

```
<?php
$sampleCollection = new SampleCollection([1, 2, 3], [4, 5, 6]);
$calculator = new CorrelationCalculator();
$result = $calculator->calculateCoefficient($sampleCollection); // 1.0
```


## Symfony2 bundle
Bundle exposes service `addvilz_correlation_calculator.correlation_calculator`, an instance of `CorrelationCalculator`.

## License
Licensed under terms and conditions of Apache 2.0 license.