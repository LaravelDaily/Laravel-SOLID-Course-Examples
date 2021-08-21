<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class SupportSalaryCalculator implements SalaryCalculatorInterface {

    public function calculate($start_date): float
    {
        return 30000 + now()->diffInYears($start_date) * 3000;
    }

}
