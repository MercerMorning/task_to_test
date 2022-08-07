<?php


namespace App\Strategy;


/**
 * Interface MathOperationInterface
 * @package App\Strategy
 */
interface MathOperationInterface
{
    /**
     * @param int $number1
     * @param $number2
     * @return int|float
     */
    public function calculate(int|float $number1, int|float $number2): int|float;
}