<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use L5Swagger\Http\Controllers\SwaggerController;


class EmployeeController extends Controller
{
    // Fetch all employees
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees, 200);
    }

    // Fetch a single employee by ID
/**
 * @OA\Get(
 *     path="/api/types/{MasterID}",
 *     summary="Get a type by MasterID",
 *     tags={"Types"},
 *     @OA\Parameter(
 *         name="MasterID",
 *         in="path",
 *         description="MasterID of the type",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="MasterID", type="integer", example=123),
 *             @OA\Property(property="name", type="string", example="Type A"),
 *             @OA\Property(property="description", type="string", example="Description of Type A")
 *         )
 *     ),
 *     @OA\Response(response=404, description="Type not found")
 * )
 */
    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee, 200);
    }

    // Store a new employee
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NIPP' => 'required|unique:employees,NIPP',
            'NAME' => 'required',
            'POSITION' => 'required',
            'UNIT' => 'required',
            'DEPARTMENT' => 'required',
            'DIRECTORATE' => 'required',
            'ACTIVE' => 'required|boolean',
        ]);

        $employee = Employee::create($validatedData);
        return response()->json(['message' => 'Employee created successfully', 'data' => $employee], 201);
    }

    // Update an existing employee
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $validatedData = $request->validate([
            'NIPP' => 'required|unique:employees,NIPP,' . $employee->id,
            'Name' => 'required',
            'Postiion' => 'required',
            'Unit' => 'required',
            'Department' => 'required',
            'Directorate' => 'required',
            'Password' => 'required',
            'Active' => 'required|boolean',
        ]);

        $employee->update($validatedData);
        return response()->json(['message' => 'Employee updated successfully', 'data' => $employee], 200);
    }

    // Delete an employee
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
