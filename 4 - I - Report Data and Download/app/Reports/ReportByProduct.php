<?php

namespace App\Reports;

use App\Interfaces\ReportDataInterface;

// This report implements only Data Interface but not Download interface
class ReportByProduct implements ReportDataInterface {

    public function getData()
    {
        return [];
    }
}
