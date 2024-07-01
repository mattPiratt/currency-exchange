<?php

namespace App\Controller\CurrencyExchange;

use App\Domain\CurrencyExchange\Service\ExchangeService;
use App\Domain\CurrencyExchange\ValueObject\Currency;
use App\Domain\CurrencyExchange\ValueObject\Money;

class CurrencyExchangeController
{

    public function __construct(
        private readonly ExchangeService $exchangeService
    ) {
    }

    public function exchange(Money $money, Currency $targetCurrency, bool $isPurchase): Money
    {
        return $this->exchangeService->exchange($money, $targetCurrency, $isPurchase);
    }
}
