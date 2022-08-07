<?php

namespace App\Tests\CalculatorDividedByOperation;


use App\Tests\BaseCalculatorTest;

class CalculatorDividedByOperationCalculatorTest extends BaseCalculatorTest
{
    /**
     * @dataProvider App\Tests\CalculatorDividedByOperation\CalculatorDividedByOperationDataProvider::intValues()
     */
    public function testWithIntValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorDividedByOperation\CalculatorDividedByOperationDataProvider::floatValues
     */
    public function testWithFloatValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorDividedByOperation\CalculatorDividedByOperationDataProvider::emptyValues
     */
    public function testWithEmptyValues($values): void
    {
        $this->testOperationThrows($values);
    }

    /**
     * @dataProvider App\Tests\CalculatorDividedByOperation\CalculatorDividedByOperationDataProvider::incorrectTypeValues
     */
    public function testWithIncorrectTypeValues($values): void
    {
        $this->testOperationThrows($values);
    }


    public function getOperation(): string
    {
        return 'divided by';
    }
}
