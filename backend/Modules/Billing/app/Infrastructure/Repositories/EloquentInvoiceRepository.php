<?php

namespace Modules\Billing\Infrastructure\Repositories;

use Modules\Billing\Domain\Entities\Invoice as EntityInvoice;
use Modules\Billing\Domain\Repositories\InvoiceRepository;
use Modules\Billing\Infrastructure\Eloquent\Invoice as EloquentInvoice;

final class EloquentInvoiceRepository implements InvoiceRepository
{
    public function save(EntityInvoice $invoice): void
    {
        EloquentInvoice::query()->updateOrCreate(
            ['id' => $invoice->id()],
            [
                'number' => $invoice->number(),
                'currency' => $invoice->amount()->currency(),
                'amount_cents' => $invoice->amount()->amountCents(),
                'status' => $invoice->status(),
            ]
        );
    }

    public function existsByNumber(string $number): bool
    {
        return EloquentInvoice::query()
            ->where('number', $number)
            ->exists();
    }
}
