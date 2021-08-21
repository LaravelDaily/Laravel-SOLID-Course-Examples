<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class DesignerSalaryCalculator implements SalaryCalculatorInterface {

    public function calculate($start_date): float
    {
        return 45000 + now()->diffInYears($start_date) * 4500;
    }

}
