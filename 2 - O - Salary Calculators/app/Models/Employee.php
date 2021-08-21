<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['employee_type', 'name', 'start_date'];

    protected $dates = ['start_date'];

    public function getSalaryAttribute()
    {
        $calculators = [
            'Director' => 'App\\Calculators\\DirectorSalaryCalculator',
            'Developer' => 'App\\Calculators\\DeveloperSalaryCalculator',
            'Designer' => 'App\\Calculators\\DesignerSalaryCalculator',
            'Support' => 'App\\Calculators\\SupportSalaryCalculator',
        ];

        try {
            // Option A:
            return (new $calculators[$this->employee_type])->calculate($this->start_date);

            // Option B:
             $calculatorClassName = 'App\\Calculators\\' . $this->employee_type . 'SalaryCalculator';
             return (new $calculatorClassName)->calculate($this->start_date);
        } catch (\Error $e) {
            // Do something when calculator does not exist
        }

//        Old way with switch-case
//        $salary = 0;
//        $years = now()->diffInYears($this->start_date);
//        switch ($this->employee_type) {
//            case 'Director':
//                $salary = 50000 + $years * 5000;
//                break;
//            case 'Developer':
//                $salary = 40000 + $years * 4000;
//                break;
//            case 'Designer':
//                $salary = 45000 + $years * 4500;
//                break;
//            case 'Support':
//                $salary = 30000 + $years * 3000;
//                break;
//        }
//
//        return $salary;
    }
}




