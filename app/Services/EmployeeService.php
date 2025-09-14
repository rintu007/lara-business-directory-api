<?php

namespace App\Services;

use App\Interfaces\EmployeeRepositoryInterface;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployees()
    {
        return $this->employeeRepository->getAllEmployees();
    }

    public function getEmployeeById(string $id)
    {
        return $this->employeeRepository->getEmployeeById($id);
    }

    public function createEmployee(array $data)
    {
        return $this->employeeRepository->createEmployee($data);
    }

    public function updateEmployee(array $data, string $id)
    {
        return $this->employeeRepository->updateEmployee($data, $id);
    }

    public function deleteEmployee(string $id)
    {
        return $this->employeeRepository->deleteEmployee($id);
    }
}