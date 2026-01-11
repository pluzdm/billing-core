<?php

namespace Modules\Billing\Application\Commands;
final class IssueInvoiceCommand
{
    public function __construct(
        public readonly string $number,
        public readonly int    $amountCents,
        public readonly string $currency,
    )
    {
    }
}
