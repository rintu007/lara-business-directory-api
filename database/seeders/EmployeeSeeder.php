<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'IT', 'description' => 'Information Technology'],
            ['name' => 'HR', 'description' => 'Human Resources'],
            ['name' => 'Finance', 'description' => 'Finance Department'],
            ['name' => 'Marketing', 'description' => 'Marketing Department'],
            ['name' => 'Operations', 'description' => 'Operations Department'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}