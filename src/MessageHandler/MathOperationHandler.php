<?php


namespace App\MessageHandler;

use App\Message\MathOperation;
use App\Services\Calculator;

/**
 * Class MathOperationHandler
 * @package App\MessageHandler
 */
class MathOperationHandler implements MessageHandlerInterface
{
    /**
     * @var Calculator
     */
    private $calculator;
    /**
     * @var MathOperation|MessageHandlerInterface
     */
    private $message;

    /**
     * MathOperationHandler constructor.
     * @param Calculator $calculator
     * @param MathOperation|MessageHandlerInterface $message
     */
    public function __construct(Calculator $calculator, MathOperation|MessageHandlerInterface $message)
    {
        $this->message = $message;
        $this->calculator = $calculator;
    }

    /**
     * @return float|int
     */
    public function handle()
    {
        return $this->calculator->calculate(
            $this->message->getOperation(),
            $this->message->getNumber1(),
            $this->message->getNumber2()
        );
    }
}