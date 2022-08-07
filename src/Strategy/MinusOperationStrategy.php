<?php


namespace App\Strategy;


/**
 * Class MinusOperationStrategy
 * @package App\Strategy
 */
class MinusOperationStrategy implements MathOperationInterface
{

    /**
     * @param int $number1
     * @param $number2
     * @return int|float
     */
    public function calculate(int|float $number1, int|float $number2): int|float
    {
        return $number1 - $number2;
    }
}