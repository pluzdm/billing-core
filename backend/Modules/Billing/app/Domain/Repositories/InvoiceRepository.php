<?php

namespace Modules\Billing\Domain\Repositories;

use Modules\Billing\Domain\Entities\Invoice;

interface InvoiceRepository
{
    public function save(Invoice $invoice): void;

    public function existsByNumber(string $number): bool;
}
