<?php

namespace App\Reports;

use App\Interfaces\ReportInterface;
use App\Models\Invoice;

class ReportByMonth implements ReportInterface {

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
