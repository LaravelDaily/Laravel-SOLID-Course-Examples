<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $employee_types = ['Director', 'Developer', 'Designer', 'Support'];

        return [
            'employee_type' => $employee_types[rand(0,3)],
            'name' => $this->faker->name,
            'start_date' => now()->subDays(rand(10, 5000))
        ];
    }
}
