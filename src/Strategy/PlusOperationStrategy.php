<?php


namespace App\Strategy;


/**
 * Class PlusOperationStrategy
 * @package App\Strategy
 */
class PlusOperationStrategy implements MathOperationInterface
{

    public function calculate(int|float $number1, int|float $number2): int|float
    {
        return $number1 + $number2;
    }
}