<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    protected $signature = 'make:admin 
        {first_name : First name}
        {last_name : Last name}
        {email : Email address}
        {password : Password}';

    protected $description = 'Create an admin employee';

    public function handle(): int
    {
        $employee = Employee::create([
            'first_name' => $this->argument('first_name'),
            'last_name' => $this->argument('last_name'),
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
            'position' => 'System Administrator',
            'department_id' => 1, // IT department
            'hire_date' => now(),
        ]);

        $this->info('Admin employee created successfully!');
        $this->line('Email: ' . $employee->email);

        return 0;
    }
}