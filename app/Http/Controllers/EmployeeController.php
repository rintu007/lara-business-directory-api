<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
        $this->middleware('auth:api', ['except' => []]);
    }

    public function index(): JsonResponse
    {
        $employees = $this->employeeService->getAllEmployees();
        return response()->json($employees);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'password' => 'required|string|min:6',
            'position' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'hire_date' => 'required|date'
        ]);

        $employee = $this->employeeService->createEmployee($validated);
        return response()->json($employee, 201);
    }

    public function show(string $id): JsonResponse
    {
        $employee = $this->employeeService->getEmployeeById($id);
        return response()->json($employee);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:employees,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'position' => 'sometimes|string|max:255',
            'department_id' => 'sometimes|exists:departments,id',
            'hire_date' => 'sometimes|date'
        ]);

        $employee = $this->employeeService->updateEmployee($validated, $id);
        return response()->json($employee);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->employeeService->deleteEmployee($id);
        return response()->json(null, 204);
    }
}