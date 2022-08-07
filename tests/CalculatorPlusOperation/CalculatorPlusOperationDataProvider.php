<?php


namespace App\Tests\CalculatorPlusOperation;


class CalculatorPlusOperationDataProvider
{
    private function intValues()
    {
        return [
            [
                'values' => [1, 2],
                'answer' => 3
            ],
            [
                'values' => [-2, 3],
                'answer' => 1
            ],
            [
                'values' => [-2, -5],
                'answer' => -7
            ],
            [
                'values' => [5, -7],
                'answer' => -2
            ],
            [
                'values' => [3, -3],
                'answer' => 0
            ],
        ];
    }

    private function floatValues()
    {
        return [
            [
                'values' => [3.2, 4.7],
                'answer' => 7.9
            ],
            [
                'values' => [3.20, 4.71],
                'answer' => 7.91
            ],
            [
                'values' => [3.20, 0.80],
                'answer' => 4
            ],
            [
                'values' => [4.5, 0.444],
                'answer' => 4.944
            ],

        ];
    }

    private function emptyValues()
    {
        return [
            [
                'values' => [null, null],
            ],
            [
                'values' => [3, null],
            ],
            [
                'values' => [null, 3],
            ],
            [
                'values' => [0, null],
            ],
            [
                'values' => [-7 , null],
            ],
        ];
    }

    private function incorrectTypeValues()
    {
        return [
            [
                'values' => ['sdf', 'sdf'],
            ],
            [
                'values' => [[], 'sdf'],
            ],
            [
                'values' => [[], 12312],
            ],
        ];
    }
}