<?php

namespace App\Tests\DataProvider;

class ExchangeDataProvider
{

    public function buyAndSellProvider(): \Generator
    {
        yield 'selling 100 EUR to GBP' => [
            [
                'fromCurrency' => 'EUR',
                'toCurrency' => 'GBP',
                'amount' => 100,
                'isPurchase' => false,
                'expected' => 158.35,
            ]
        ];

        yield 'buying 100 GBP with EUR' => [
            [
                'fromCurrency' => 'EUR',
                'toCurrency' => 'GBP',
                'amount' => 100,
                'isPurchase' => true,
                'expected' => 155.21,
            ]
        ];

        yield 'selling 100 GBP to EUR' => [
            [
                'fromCurrency' => 'GBP',
                'toCurrency' => 'EUR',
                'amount' => 100,
                'isPurchase' => false,
                'expected' => 155.86,
            ]
        ];

        yield 'buying 100 EUR with GBP' => [
            [
                'fromCurrency' => 'GBP',
                'toCurrency' => 'EUR',
                'amount' => 100,
                'isPurchase' => true,
                'expected' => 152.78,
            ]
        ];
    }


}
