<?php


namespace App\Strategy;


/**
 * Class TimesOperationStrategy
 * @package App\Strategy
 */
class TimesOperationStrategy implements MathOperationInterface
{

    /**
     * @param int $number1
     * @param $number2
     * @return int|float
     */
    public function calculate(int|float $number1, int|float $number2): int|float
    {
        return round($number1 * $number2, 2);
    }
}