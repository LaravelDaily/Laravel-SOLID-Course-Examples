<?php

namespace App\Calculators;

use App\Interfaces\SalaryCalculatorInterface;

class DirectorSalaryCalculator implements SalaryCalculatorInterface {

    // 1. Use type-hints and return-types for everything

    // 2. $bonus parameter won't throw error if it has a default value, but
    // it still may be considered a violation.
    // Maybe add it to the interface and to all the class methods?
    public function calculate(string $start_date, float $bonus = 0): float
    {
        // Even if you don't use $start_date inside, you need to accept it
        // as a parameter, to stick to the interface
        return 50000 + $bonus;
    }

    // If you define method in one class it may or may not be implemented
    // in other classes that implement this interface
    // Maybe add it to the interface? Or make it private?
    public function format(float $salary): string
    {
        return '$' . number_format($salary, 2);
    }

}
