<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportInterface;

class InvoiceReportController extends Controller
{
    public function reportByMonth(ReportInterface $report, $format = 'html')
    {
        $data = $report->getData();

        if ($format != 'html') {
            return $report->download($format);
        }

        return view('invoices.report_month',  compact('data'));
    }
}
