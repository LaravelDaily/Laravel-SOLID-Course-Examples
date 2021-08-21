<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class DirectorSalaryCalculator implements SalaryCalculatorInterface {

    public function calculate($start_date): float
    {
        return 50000 + now()->diffInYears($start_date) * 5000;
    }

}
