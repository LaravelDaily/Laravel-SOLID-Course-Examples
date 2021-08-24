<?php

namespace App\Interfaces;

interface ReportInterface {

    public function getData();

    public function download($format);

}
