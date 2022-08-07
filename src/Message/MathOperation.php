<?php


namespace App\Message;


use App\Enums\MathOperationsQueue;
use App\Infrastructure\Interfaces\ToArrayInterface;

/**
 * Class MathOperation
 * @package App\Message
 */
class MathOperation implements MessageInterface, ToArrayInterface
{
    /**
     * @var string
     */
    private $operation;
    /**
     * @var
     */
    private $number1;
    /**
     * @var
     */
    private $number2;


    /**
     * MathOperation constructor.
     * @param string $operation
     * @param $number1
     * @param $number2
     */
    public function __construct(string $operation, $number1, $number2)
    {
        $this->operation = $operation;
        $this->number1 = $number1;
        $this->number2 = $number2;
    }

    /**
     * @return string
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * @return mixed
     */
    public function getNumber1()
    {
        return $this->number1;
    }

    /**
     * @return mixed
     */
    public function getNumber2()
    {
        return $this->number2;
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'operation' => $this->operation,
            'number1' => $this->number1,
            'number2' => $this->number2,
        ];
    }

    /**
     * @return string
     */
    public function getQueueName(): string
    {
        return MathOperationsQueue::NAME;
    }

    public function getString(): string
    {
        return $this->number1 . ' ' . $this->operation . ' ' . $this->number2;
    }
}