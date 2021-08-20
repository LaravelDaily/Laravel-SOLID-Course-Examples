<?php

namespace App\Services\Reports;

use Illuminate\Http\Response;

class ReportDownloadService {

    public function downloadReport($report, $format = 'html')
    {
        if ($format == 'pdf') {
            return $this->downloadAsPDF($report);
        }
        if ($format == 'csv') {
            return $this->downloadAsCSV($report);
        }
        if ($format == 'xls') {
            return $this->downloadAsXLS($report);
        }
    }

    private function downloadAsPdf($report): Response
    {
        // to be implemented - download as PDF
    }

    private function downloadAsCSV($report): Response
    {
        // to be implemented - download as CSV
    }

    private function downloadAsXLS($report): Response
    {
        // to be implemented - download as XLS
    }


}
