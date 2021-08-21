<?php

namespace App\Interfaces;

interface SalaryCalculatorInterface {

    public function calculate($start_date): float;

}
