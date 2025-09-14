<?php

namespace App\Services;

use App\Interfaces\DepartmentRepositoryInterface;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getAllDepartments()
    {
        return $this->departmentRepository->getAllDepartments();
    }

    public function getDepartmentById(string $id)
    {
        return $this->departmentRepository->getDepartmentById($id);
    }

    public function createDepartment(array $data)
    {
        return $this->departmentRepository->createDepartment($data);
    }

    public function updateDepartment(array $data, string $id)
    {
        return $this->departmentRepository->updateDepartment($data, $id);
    }

    public function deleteDepartment(string $id)
    {
        return $this->departmentRepository->deleteDepartment($id);
    }
}