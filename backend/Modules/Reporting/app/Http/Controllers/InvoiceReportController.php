<?php

namespace Modules\Reporting\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Reporting\Application\Queries\GetInvoiceHandler;
use Modules\Reporting\Application\Queries\GetInvoiceQuery;

class InvoiceReportController extends Controller
{
    public function show(string $id, GetInvoiceHandler $handler)
    {
        $result = $handler->handle(new GetInvoiceQuery($id));

        if (!$result) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json([
            'id' => $result->id,
            'number' => $result->number,
            'currency' => $result->currency,
            'amount_cents' => $result->amountCents,
            'status' => $result->status,
            'created_at' => $result->createdAt,
        ]);
    }
}
