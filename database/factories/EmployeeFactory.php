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
        $genders = ['male', 'female'];
        $gender = $genders[rand(0, 1)];
        return [
            'name' => $this->faker->firstName($gender),
            'surname' => $this->faker->lastName,
            'patronymic' => null,
            'gender' => $gender,
            'salary' => rand(500, 2000)
        ];
    }
}
