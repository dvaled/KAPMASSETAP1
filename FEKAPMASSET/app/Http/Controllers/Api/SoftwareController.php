<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    // Get all software records
    public function index()
    {
        $softwares = Software::with('Hardware')->get();
        return response()->json($softwares, 200);
    }

    // Get a specific software record by ID
    public function show($id)
    {
        $software = Software::with('Hardware')->find($id);

        if (!$software) {
            return response()->json(['message' => 'Software record not found'], 404);
        }

        return response()->json($software, 200);
    }

    // Store a new software record
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IdSoftware' => 'required',
            'IdAsset' => 'required',
            'SoftwareType' => 'required|string|max:255',
            'SoftwareCategory' => 'required|string|max:255',
            'SoftwareName' => 'required|string|max:255',
            'SoftrwareLicense' => 'required|string|max:255',
        ]);

        $software = Software::create($validatedData);
        return response()->json(['message' => 'Software record created successfully', 'data' => $software], 201);
    }

    // Update an existing software record
    public function update(Request $request, $id)
    {
        $software = Software::find($id);

        if (!$software) {
            return response()->json(['message' => 'Software record not found'], 404);
        }

        $validatedData = $request->validate([
            'IdSoftware' => 'required',
            'IdAsset' => 'required',
            'SoftwareType' => 'required|string|max:255',
            'SoftwareCategory' => 'required|string|max:255',
            'SoftwareName' => 'required|string|max:255',
            'SoftrwareLicense' => 'required|string|max:255',
        ]);

        $software->update($validatedData);
        return response()->json(['message' => 'Software record updated successfully', 'data' => $software], 200);
    }

    // Delete a software record
    public function destroy($id)
    {
        $software = Software::find($id);

        if (!$software) {
            return response()->json(['message' => 'Software record not found'], 404);
        }

        $software->delete();
        return response()->json(['message' => 'Software record deleted successfully'], 200);
    }
}
