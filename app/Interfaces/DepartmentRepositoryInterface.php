<?php

namespace App\Interfaces;

interface DepartmentRepositoryInterface
{
    public function getAllDepartments();
    public function getDepartmentById(string $id);
    public function createDepartment(array $data);
    public function updateDepartment(array $data, string $id);
    public function deleteDepartment(string $id);
}