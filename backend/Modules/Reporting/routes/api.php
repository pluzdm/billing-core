<?php

use Illuminate\Support\Facades\Route;
use Modules\Reporting\Http\Controllers\InvoiceReportController;
use Modules\Reporting\Http\Controllers\ReportingController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('reportings', ReportingController::class)->names('reporting');
});

Route::get('/reports/invoices/{id}', [InvoiceReportController::class, 'show']);
