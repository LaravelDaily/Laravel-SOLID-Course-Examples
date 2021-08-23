<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Reports\ReportByMonth;
use App\Services\Reports\InvoiceReportService;
use App\Services\Reports\ReportDownloadService;

class InvoiceReportController extends Controller
{
    public function reportByMonth(ReportByMonth $report, $format = 'html')
    {
        $data = $report->getData();

        if ($format != 'html') {
            return $report->download($format);
        }

        return view('invoices.report_month',  compact('data'));
    }
}
