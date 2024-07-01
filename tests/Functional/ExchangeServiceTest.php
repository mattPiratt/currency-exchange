<?php

namespace App\Tests\Functional;

use App\Controller\CurrencyExchange\CurrencyExchangeController;
use App\Domain\CurrencyExchange\Service\ExchangeService;
use App\Domain\CurrencyExchange\ValueObject\Currency;
use App\Domain\CurrencyExchange\ValueObject\ExchangeRate;
use App\Domain\CurrencyExchange\ValueObject\Money;
use PHPUnit\Framework\TestCase;

class ExchangeServiceTest extends TestCase
{
    private CurrencyExchangeController $currencyExchangeController;

    protected function setUp(): void
    {
        $eur = new Currency('EUR');
        $gbp = new Currency('GBP');

        $exchangeRates = [
            new ExchangeRate($eur, $gbp, 1.5678),
            new ExchangeRate($gbp, $eur, 1.5432),
        ];;
        $this->currencyExchangeController = new CurrencyExchangeController(new ExchangeService($exchangeRates));
    }

    /**
     * @dataProvider App\Tests\DataProvider\ExchangeDataProvider::buyAndSellProvider()
     */
    public function testBuyAndSell($exchangeData): void
    {
        $currencyFrom = new Currency($exchangeData['fromCurrency']);
        $targetCurrency = new Currency($exchangeData['toCurrency']);
        $money = new Money($currencyFrom, $exchangeData['amount']);

        $result = $this->currencyExchangeController->exchange(
            money: $money,
            targetCurrency: $targetCurrency,
            isPurchase: $exchangeData['isPurchase']
        );

        $this->assertEquals($exchangeData['expected'], $result->amount,);
        $this->assertEquals($targetCurrency->code, $result->currency->code);
    }

}
