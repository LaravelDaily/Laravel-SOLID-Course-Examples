<?php

namespace App\Reports;

use App\Interfaces\ReportInterface;

class TestReportByMonth implements ReportInterface {

    public function getData()
    {
        return []; // test
    }

    public function download($format)
    {
        // Implement the download - this is a "fake" example
        return response()->download('report_file.' . $format);
    }

}
