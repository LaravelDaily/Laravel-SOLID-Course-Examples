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

        // "Bad" way: now our Report Service is also responsible for downloads
        if ($format == 'pdf') {
            return $invoiceReportService->downloadAsPDF($report);
        }
        if ($format == 'csv') {
            return $invoiceReportService->downloadAsCSV($report);
        }
        if ($format == 'xls') {
            return $invoiceReportService->downloadAsXLS($report);
        }

        // "Better" way: separate Report Downloader Service with Single Responsibility
        if ($format != 'html') {
            return $reportDownloadService->downloadReport($report, $format);
        }

        return view('invoices.report_month',  compact('report'));
    }

    public function reportByProduct(InvoiceReportService $invoiceReportService)
    {
        $report = $invoiceReportService->getReportByProduct();

        return view('invoices.report_product',  compact('report'));
    }
}
