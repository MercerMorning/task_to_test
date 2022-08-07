<?php


namespace App\Tests\CalculatorTimesOperation;


class CalculatorTimesOperationDataProvider
{

    private function intValues()
    {
        return [
            [
                'values' => [1, 2],
                'answer' => 2
            ],
            [
                'values' => [-2, 3],
                'answer' => -6
            ],
            [
                'values' => [-2, -5],
                'answer' => 10
            ],
            [
                'values' => [5, -7],
                'answer' => -35
            ],
            [
                'values' => [3, -3],
                'answer' => -9
            ],
        ];
    }

    private function floatValues()
    {
        return [
            [
                'values' => [3.2, 4.7],
                'answer' => 15.04
            ],
            [
                'values' => [3.20, 4.71],
                'answer' => 15.07
            ],
            [
                'values' => [3.20, 0.80],
                'answer' => 2.56
            ],
            [
                'values' => [4.5, 0.444],
                'answer' => 2
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