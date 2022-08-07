<?php


namespace App\Services;


use App\Strategy\DividedByOperationStrategy;
use App\Strategy\MinusOperationStrategy;
use App\Strategy\PlusOperationStrategy;
use App\Strategy\TimesOperationStrategy;

class Calculator
{
    private $executor;

    public function __construct(MathOperationExecutor $executor)
    {
        $this->executor = $executor;
    }

    public function calculate($operation, $number1, $number2)
    {
        switch ($operation) {
            case 'plus':
                $this->executor->setStrategy(new PlusOperationStrategy());
                break;
            case 'minus':
                $this->executor->setStrategy(new MinusOperationStrategy());
                break;
            case 'times':
                $this->executor->setStrategy(new TimesOperationStrategy());
                break;
            case 'divided by':
                $this->executor->setStrategy(new DividedByOperationStrategy());
                break;
        }
        return $this->executor->execute($number1, $number2);
    }
}