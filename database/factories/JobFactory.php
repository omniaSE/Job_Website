<?php

namespace Database\Factories;
use App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //generate fake job titel and salary 
            'title' => $this->faker->unique()->jobTitle(),
            'employee_id' =>Employee::factory(),
            'salary' => '50.000 USE'
        ];
    }
}
