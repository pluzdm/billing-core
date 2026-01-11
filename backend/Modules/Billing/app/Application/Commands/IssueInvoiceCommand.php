<?php

namespace Modules\Billing\Application\Commands;
final readonly class IssueInvoiceCommand
{
    public function __construct(
        public string $number,
        public int    $amountCents,
        public string $currency,
    )
    {
    }
}
