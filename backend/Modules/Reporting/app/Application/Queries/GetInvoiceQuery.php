<?php

namespace Modules\Reporting\Application\Queries;

final readonly class GetInvoiceQuery
{
    public function __construct(
        public string $id
    ) {}
}
