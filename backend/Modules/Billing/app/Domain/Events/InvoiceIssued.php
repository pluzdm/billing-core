<?php

namespace Modules\Billing\Domain\Events;

final readonly class InvoiceIssued
{
    public function __construct(
        public string $invoiceId,
        public string $number,
        public string $currency,
        public int    $amountCents,
    ) {}
}
