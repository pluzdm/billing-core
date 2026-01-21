<?php

namespace Modules\Reporting\Application\Queries;

use Illuminate\Support\Facades\Cache;
use Modules\Billing\Infrastructure\Eloquent\Invoice as BillingInvoice;
use Modules\Reporting\Application\DTO\InvoiceReadModel;

final class GetInvoiceHandler
{
    public function handle(GetInvoiceQuery $query): ?InvoiceReadModel
    {
        $cacheKey = "reports:invoice:{$query->id}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($query) {
            $invoice = BillingInvoice::query()->find($query->id);
            if (!$invoice) {
                return null;
            }

            return new InvoiceReadModel(
                id: (string)$invoice->id,
                number: (string)$invoice->number,
                currency: (string)$invoice->currency,
                amountCents: (int)$invoice->amount_cents,
                status: (string)$invoice->status,
                createdAt: $invoice->created_at?->toISOString() ?? '',
            );
        });
    }
}
