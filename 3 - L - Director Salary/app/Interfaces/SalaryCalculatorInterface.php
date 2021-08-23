<?php

namespace App\Interfaces;

interface SalaryCalculatorInterface {

    public function calculate(string $start_date): float;

    // If you define some method in the interface, it HAS to be implemented
    // in all classes that implement that interface
    // public function format(float $salary): string;

}
