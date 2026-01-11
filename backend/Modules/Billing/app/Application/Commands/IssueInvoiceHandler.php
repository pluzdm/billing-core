<?php

namespace Modules\Billing\Application\Commands;

use Modules\Billing\Domain\Entities\Invoice as EntityInvoice;
use Modules\Billing\Domain\ValueObjects\Money;
use Modules\Billing\Infrastructure\Eloquent\Invoice as EloquentInvoice;


final class IssueInvoiceHandler
{
    public function handle(IssueInvoiceCommand $command): EntityInvoice
    {
        $invoice = new EntityInvoice(
            $command->number,
            new Money($command->amountCents, $command->currency)
        );

        EloquentInvoice::query()->create([
            'id' => $invoice->id(),
            'number' => $invoice->number(),
            'currency' => $invoice->amount()->currency(),
            'amount_cents' => $invoice->amount()->amountCents(),
            'status' => $invoice->status(),
        ]);

        return $invoice;
    }
}
