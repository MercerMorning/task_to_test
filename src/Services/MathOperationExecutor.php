<?php


namespace App\Services;


use App\Strategy\MathOperationInterface;
use Exception;

/**
 * Class MathOperationExecutor
 * @package App\Services
 */
class MathOperationExecutor
{
    /**
     * @var MathOperationInterface
     */
    private MathOperationInterface $strategy;

    /**
     * @param MathOperationInterface $strategy
     */
    public function setStrategy(MathOperationInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param $number1
     * @param $number2
     * @return float|int
     * @throws Exception
     */
    public function execute($number1, $number2)
    {
        if ($this->strategy === null) throw new Exception('Strategy is not set');
        if (!filter_var($number1, FILTER_VALIDATE_FLOAT) || !filter_var($number2, FILTER_VALIDATE_FLOAT)) {
            throw new Exception('incorrect type of variables');
        }
        return $this->strategy->calculate($number1, $number2);
    }
}