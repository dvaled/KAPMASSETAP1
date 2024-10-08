<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    // Fetch all employees
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Employee');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('employee.index', ['employeeData' => $data]); // Keep the view name consistent
    }

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
