<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Get all maintenance records
    public function index()
    {
        $maintenances = Maintenance::with(['MasterID', 'User'])->get();
        return response()->json($maintenances, 200);
    }

    // Get a specific maintenance record by ID
    public function show($id)
    {
        $maintenance = Maintenance::with(['MasterID', 'User'])->find($id);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        return response()->json($maintenance, 200);
    }

    // Store a new maintenance record
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'MaintenanceID' => 'required',
            'AssetID' => 'required',
            'User_Added' => 'required|integer',
            'Notes' => 'required|string|max:255',
            'Date_Added' => 'required|date',
        ]);

        $maintenance = Maintenance::create($validatedData);
        return response()->json(['message' => 'Maintenance record created successfully', 'data' => $maintenance], 201);
    }

    // Update an existing maintenance record
    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::find($id);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        $validatedData = $request->validate([
            'MaintenanceID' => 'required',
            'AssetID' => 'required',
            'User_Added' => 'required|integer',
            'Notes' => 'required|string|max:255',
            'Date_Added' => 'required|date',
        ]);

        $maintenance->update($validatedData);
        return response()->json(['message' => 'Maintenance record updated successfully', 'data' => $maintenance], 200);
    }

    // Delete a maintenance record
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance record not found'], 404);
        }

        $maintenance->delete();
        return response()->json(['message' => 'Maintenance record deleted successfully'], 200);
    }
}
