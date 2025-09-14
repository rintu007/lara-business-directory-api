<?php

namespace App\Interfaces;

use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function getAllEmployees();
    public function getEmployeeById(string $id);
    public function createEmployee(array $data);
    public function updateEmployee(array $data, string $id);
    public function deleteEmployee(string $id);
}