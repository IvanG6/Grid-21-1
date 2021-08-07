<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deps = [
            'Back-end',
            'Front-end',
            'Testing',
        ];

        foreach ($deps as $dep) {
            Department::factory(1)->create([
                'name' => $dep
            ]);
        }
    }
}
