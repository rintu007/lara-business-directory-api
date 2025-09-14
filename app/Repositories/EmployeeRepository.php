<?php

namespace App\Repositories;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployees()
    {
        return Employee::with('department')->get();
    }

    public function getEmployeeById(string $id)
    {
        return Employee::with('department')->findOrFail($id);
    }

    public function createEmployee(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return Employee::create($data);
    }

    public function updateEmployee(array $data, string $id)
    {
        $employee = Employee::findOrFail($id);
        
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        $employee->update($data);
        return $employee->fresh()->load('department');
    }

    public function deleteEmployee(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return true;
    }
}