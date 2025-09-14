<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(): JsonResponse
    {
        $departments = $this->departmentService->getAllDepartments();
        return response()->json($departments);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments',
            'description' => 'nullable|string'
        ]);

        $department = $this->departmentService->createDepartment($validated);
        return response()->json($department, 201);
    }

    public function show(string $id): JsonResponse
    {
        $department = $this->departmentService->getDepartmentById($id);
        return response()->json($department);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255|unique:departments,name,' . $id,
            'description' => 'nullable|string'
        ]);

        $department = $this->departmentService->updateDepartment($validated, $id);
        return response()->json($department);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->departmentService->deleteDepartment($id);
        return response()->json(null, 204);
    }
}