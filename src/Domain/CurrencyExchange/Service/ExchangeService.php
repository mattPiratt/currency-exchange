<?php

namespace App\Domain\CurrencyExchange\Service;

use App\Domain\CurrencyExchange\ValueObject\Currency;
use App\Domain\CurrencyExchange\ValueObject\ExchangeRate;
use App\Domain\CurrencyExchange\ValueObject\Money;

class ExchangeService
{
    private float $feePercentage = 0.01;

    /**
     * @param ExchangeRate[] $exchangeRates
     */
    public function __construct(private array $exchangeRates)
    {
    }

    public function exchange(Money $money, Currency $targetCurrency, bool $isPurchase): Money
    {
        $sourceCurrencyCode = $money->currency->code;
        $targetCurrencyCode = $targetCurrency->code;

        $rate = $this->getExchangeRate($sourceCurrencyCode, $targetCurrencyCode);

        $amount = $money->amount * $rate->rate;
        $fee = $amount * $this->feePercentage;

        if ($isPurchase) {
            $amount -= $fee;
        } else {
            $amount += $fee;
        }

        return new Money($targetCurrency, $amount);
    }

    private function getExchangeRate(string $fromCurrencyCode, string $toCurrencyCode): ExchangeRate
    {
        foreach ($this->exchangeRates as $exchangeRate) {
            if (
                $exchangeRate->fromCurrency->code === $fromCurrencyCode
                && $exchangeRate->toCurrency->code === $toCurrencyCode
            ) {
                return $exchangeRate;
            }
        }

        throw new \InvalidArgumentException('Exchange rate not available');
    }
}
