<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // Fetch all types
    public function index()
    {
        $types = Type::all();
        return response()->json($types, 200);
    }

    // Fetch a single type by ID
    public function show($id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        return response()->json($type, 200);
    }

    // Store a new type
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Condition' => 'required',
            'NoSr' => 'required',
            'Description' => 'required',
            'ValueGcm' => 'required',
            'TypeGcm' => 'required',
            'Active' => 'required|boolean',
        ]);

        $type = Type::create($validatedData);
        return response()->json(['message' => 'Type created successfully', 'data' => $type], 201);
    }

    // Update an existing type
    public function update(Request $request, $id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $validatedData = $request->validate([
            'Condition' => 'required',
            'NoSr' => 'required',
            'Description' => 'required',
            'ValueGcm' => 'required',
            'TypeGcm' => 'required',
            'Active' => 'required|boolean',
        ]);

        $type->update($validatedData);
        return response()->json(['message' => 'Type updated successfully', 'data' => $type], 200);
    }

    // Delete a type
    public function destroy($id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $type->delete();
        return response()->json(['message' => 'Type deleted successfully'], 200);
    }
}


