<?php

namespace Modules\Billing\Application\Commands;

use Modules\Billing\Domain\Entities\Invoice;
use Modules\Billing\Domain\Events\InvoiceIssued;
use Modules\Billing\Domain\Repositories\InvoiceRepository;
use Modules\Billing\Domain\ValueObjects\Money;


final readonly class IssueInvoiceHandler
{
    public function __construct(private InvoiceRepository $repo) {}

    public function handle(IssueInvoiceCommand $command): Invoice
    {
        if ($this->repo->existsByNumber($command->number)) {
            throw new \DomainException('Invoice number already exists');
        }

        $invoice = new Invoice(
            $command->number,
            new Money($command->amountCents, $command->currency)
        );
        $this->repo->save($invoice);

        event(new InvoiceIssued(
            invoiceId: $invoice->id(),
            number: $invoice->number(),
            currency: $invoice->amount()->currency(),
            amountCents: $invoice->amount()->amountCents(),
        ));

        return $invoice;
    }
}
