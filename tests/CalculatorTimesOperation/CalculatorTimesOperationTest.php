<?php

namespace App\Tests\CalculatorTimesOperation;


use App\Tests\BaseCalculatorTest;

class CalculatorTimesOperation extends BaseCalculatorTest
{
    /**
     * @dataProvider App\Tests\CalculatorTimesOperation\CalculatorTimesOperationDataProvider::intValues()
     */
    public function testWithIntValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorTimesOperation\CalculatorTimesOperationDataProvider::floatValues
     */
    public function testWithFloatValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorTimesOperation\CalculatorTimesOperationDataProvider::emptyValues
     */
    public function testWithEmptyValues($values): void
    {
        $this->testOperationThrows($values);
    }

    /**
     * @dataProvider App\Tests\CalculatorTimesOperation\CalculatorTimesOperationDataProvider::incorrectTypeValues
     */
    public function testWithIncorrectTypeValues($values): void
    {
        $this->testOperationThrows($values);
    }


    public function getOperation(): string
    {
        return 'times';
    }
}
