<?php

namespace Modules\Reporting\Application\Listeners;

use Illuminate\Support\Facades\Log;
use Modules\Billing\Domain\Events\InvoiceIssued;

final class OnInvoiceIssued
{
    public function handle(InvoiceIssued $event): void
    {
        Log::info('Invoice issued (Reporting module)', [
            'invoice_id' => $event->invoiceId,
            'number' => $event->number,
            'amount_cents' => $event->amountCents,
            'currency' => $event->currency,
        ]);
    }
}
