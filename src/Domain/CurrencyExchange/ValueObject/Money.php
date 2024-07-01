<?php

namespace App\Domain\CurrencyExchange\ValueObject;

readonly class Money
{
    public float $amount;

    public function __construct(
        public Currency $currency,
        float $amount
    ) {
        $this->amount = round($amount, 2);
    }

    public function add(Money $other): Money
    {
        if ($this->currency->code !== $other->currency->code) {
            throw new \InvalidArgumentException('Currencies must match');
        }

        return new Money($this->currency, $this->amount + $other->amount);
    }

    public function subtract(Money $other): Money
    {
        if ($this->currency->code !== $other->currency->code) {
            throw new \InvalidArgumentException('Currencies must match');
        }

        return new Money($this->currency, $this->amount - $other->amount);
    }
}
