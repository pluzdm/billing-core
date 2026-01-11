<?php

namespace Modules\Billing\Domain\ValueObjects;
class Money
{
    public function __construct(
        private int    $amountCents,
        private string $currency
    )
    {
        if ($amountCents < 0) {
            throw new \InvalidArgumentException('Amount must be >= 0');
        }
        $currency = strtoupper(trim($currency));
        if (strlen($currency) !== 3) {
            throw new \InvalidArgumentException('Currency must be ISO-4217 (3 letters)');
        }
        $this->currency = $currency;
    }

    public function amountCents(): int
    {
        return $this->amountCents;
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
