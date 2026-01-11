<?php

namespace Modules\Billing\Domain\Entities;

use Modules\Billing\Domain\ValueObjects\Money;
use Symfony\Component\Uid\Uuid;

class Invoice
{
    private string $id;
    private string $number;
    private string $status;
    private Money $amount;

    public function __construct(string $number, Money $amount)
    {
        $number = trim($number);
        if ($number === '') {
            throw new \InvalidArgumentException('Invoice number is required');
        }

        $this->id = Uuid::v7()->toRfc4122();
        $this->number = $number;
        $this->status = 'issued';
        $this->amount = $amount;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function number(): string
    {
        return $this->number;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function amount(): Money
    {
        return $this->amount;
    }
}
