<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\InvoiceReportService;
use App\Services\Reports\ReportDownloadService;

class InvoiceReportController extends Controller
{
    public function reportByMonth(InvoiceReportService $invoiceReportService,
                                  ReportDownloadService $reportDownloadService,
                                  $format = 'html')
    {
        $report = $invoiceReportService->getReportByMonth();

        if ($format != 'html') {
            return $reportDownloadService->downloadReport($report, $format);
        }

        return view('invoices.report_month',  compact('report'));
    }
}
