<?php


namespace App\Tests;


use App\Services\Calculator;
use App\Services\MathOperationExecutor;
use App\Tests\Interfaces\Operational;
use Exception;
use PHPUnit\Framework\TestCase;

abstract class BaseCalculatorTest extends TestCase implements Operational
{
    protected $operation;

    protected function testOperationEquals($values, $answer)
    {
        $executor = new MathOperationExecutor();
        $calculator = new Calculator($executor);
        $result = $calculator->calculate($this->getOperation(), $values[0], $values[1]);
        $this->assertEquals($answer, $result);
    }

    protected function testOperationThrows($values)
    {
        $executor = new MathOperationExecutor();
        $calculator = new Calculator($executor);
        $this->expectException(Exception::class);
        $calculator->calculate($this->getOperation(), $values[0], $values[1]);
    }
}