<?php

namespace App\Domain\CurrencyExchange\ValueObject;

readonly class Currency
{

    public function __construct(public string $code)
    {
    }

}
