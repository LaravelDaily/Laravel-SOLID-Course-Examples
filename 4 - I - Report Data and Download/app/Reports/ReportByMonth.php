<?php

namespace App\Reports;

use App\Interfaces\ReportDataInterface;
use App\Interfaces\ReportDownloadInterface;
use App\Interfaces\ReportInterface;
use App\Models\Invoice;

// This report implemented a "general" ReportInterface
// But it's better to implement two smaller interfaces
// class ReportByMonth implements ReportInterface {
class ReportByMonth implements ReportDataInterface, ReportDownloadInterface {

    public function getData()
    {
        return Invoice::withSum('products', \DB::raw('invoice_product.price * invoice_product.quantity'))
            ->orderBy('invoice_date', 'desc')
            ->get()
            ->groupBy(function($invoice) {
                return $invoice->invoice_date->format('Y-m');
            });
    }

    public function download($format)
    {
        // Implement the download - this is a "fake" example
        return response()->download('report_file.' . $format);
    }

}
