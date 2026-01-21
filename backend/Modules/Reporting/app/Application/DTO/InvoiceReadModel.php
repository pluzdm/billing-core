<?php

namespace Modules\Reporting\Application\DTO;

final readonly class InvoiceReadModel
{
    public function __construct(
        public string $id,
        public string $number,
        public string $currency,
        public int    $amountCents,
        public string $status,
        public string $createdAt,
    )
    {
    }
}
