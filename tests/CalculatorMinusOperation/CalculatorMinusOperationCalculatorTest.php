<?php

namespace App\Tests\CalculatorMinusOperation;


use App\Tests\BaseCalculatorTest;

class CalculatorMinusOperationCalculatorTest extends BaseCalculatorTest
{
    /**
     * @dataProvider App\Tests\CalculatorMinusOperation\CalculatorMinusOperationDataProvider::intValues()
     */
    public function testWithIntValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorMinusOperation\CalculatorMinusOperationDataProvider::floatValues
     */
    public function testWithFloatValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorMinusOperation\CalculatorMinusOperationDataProvider::emptyValues
     */
    public function testWithEmptyValues($values): void
    {
        $this->testOperationThrows($values);
    }

    /**
     * @dataProvider App\Tests\CalculatorMinusOperation\CalculatorMinusOperationDataProvider::incorrectTypeValues
     */
    public function testWithIncorrectTypeValues($values): void
    {
        $this->testOperationThrows($values);
    }


    public function getOperation(): string
    {
        return 'minus';
    }
}
