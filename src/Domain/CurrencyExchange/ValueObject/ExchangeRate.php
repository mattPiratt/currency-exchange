<?php

namespace App\Domain\CurrencyExchange\ValueObject;

readonly class ExchangeRate
{
    public function __construct(
        public Currency $fromCurrency,
        public Currency $toCurrency,
        public float $rate
    ) {
    }
}
