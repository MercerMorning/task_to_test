<?php

namespace App\Tests\CalculatorPlusOperation;

use App\Tests\BaseCalculatorTest;

class CalculatorPlusOperationCalculatorTest extends BaseCalculatorTest
{
    protected $operation = 'plus';

    /**
     * @dataProvider App\Tests\CalculatorPlusOperation\CalculatorPlusOperationDataProvider::intValues()
     */
    public function testWithIntValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorPlusOperation\CalculatorPlusOperationDataProvider::floatValues
     */
    public function testWithFloatValues($values, $answer): void
    {
        $this->testOperationEquals($values, $answer);
    }

    /**
     * @dataProvider App\Tests\CalculatorPlusOperation\CalculatorPlusOperationDataProvider::emptyValues
     */
    public function testWithEmptyValues($values): void
    {
        $this->testOperationThrows($values);
    }

    /**
     * @dataProvider App\Tests\CalculatorPlusOperation\CalculatorPlusOperationDataProvider::incorrectTypeValues
     */
    public function testWithIncorrectTypeValues($values): void
    {
        $this->testOperationThrows($values);
    }


    public function getOperation(): string
    {
        return 'plus';
    }
}
