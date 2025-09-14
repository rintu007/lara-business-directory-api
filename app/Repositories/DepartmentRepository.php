<?php

namespace App\Repositories;

use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAllDepartments()
    {
        return Department::all();
    }

    public function getDepartmentById(string $id)
    {
        return Department::findOrFail($id);
    }

    public function createDepartment(array $data)
    {
        return Department::create($data);
    }

    public function updateDepartment(array $data, string $id)
    {
        $department = Department::findOrFail($id);
        $department->update($data);
        return $department->fresh();
    }

    public function deleteDepartment(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return true;
    }
}