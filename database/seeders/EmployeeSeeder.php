<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory(100)->create();

        $employees = Employee::all();

        foreach ($employees as $employee) {
            $departments = Department::inRandomOrder()->limit(rand(1, 2))->get();
            $employee->departments()->attach($departments);
        }

        Department::factory(1)->create([
            'name' => 'UI/UX'
        ]);
    }
}
