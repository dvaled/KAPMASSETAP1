<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function store(Request $request){
        $validatedData = $request->validate([
            'NIPP' => 'required|unique:employees,NIPP',
            'NAME' => 'required',
            'POSITION' => 'required',
            'UNIT' => 'required',
            'DEPARTMENT' => 'required',
            'DIRECTORATE' => 'required',
            'ACTIVE' => 'required|boolean',
        ]);
        
        Employee::create($validatedData);
        return redirect()->route('employee.index')->with('success', 'employee added successfully');

    }
}
