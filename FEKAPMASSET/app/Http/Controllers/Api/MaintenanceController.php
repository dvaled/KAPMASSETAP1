<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Get all maintenance records
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Maintenance');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('maintenance.index', ['maintenanceData' => $data]); // Keep the view name consistent
    }

    // // Get a specific maintenance record by ID
    // public function show($id)
    // {
    //     $maintenance = Maintenance::with(['MASTERID', 'User'])->find($id);

    //     if (!$maintenance) {
    //         return response()->json(['message' => 'Maintenance record not found'], 404);
    //     }

    //     return response()->json($maintenance, 200);
    // }

    // // Store a new maintenance record
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         "MAINTENANCEID"=> 'required',
    //         "IDASSET"=> 'required',
    //         "USERADDED"=> 'required',
    //         "NOTES"=> 'required',
    //         "DATEADDED"=> 'required'
    //     ]);

    //     $maintenance = Maintenance::create($validatedData);
    //     return response()->json(['message' => 'Maintenance record created successfully', 'data' => $maintenance], 201);
    // }

    // // Update an existing maintenance record
    // public function update(Request $request, $id)
    // {
    //     $maintenance = Maintenance::find($id);

    //     if (!$maintenance) {
    //         return response()->json(['message' => 'Maintenance record not found'], 404);
    //     }

    //     $validatedData = $request->validate([
    //         'MaintenanceID' => 'required',
    //         'AssetID' => 'required',
    //         'User_Added' => 'required|integer',
    //         'Notes' => 'required|string|max:255',
    //         'Date_Added' => 'required|date',
    //     ]);

    //     $maintenance->update($validatedData);
    //     return response()->json(['message' => 'Maintenance record updated successfully', 'data' => $maintenance], 200);
    // }

    // // Delete a maintenance record
    // public function destroy($id)
    // {
    //     $maintenance = Maintenance::find($id);

    //     if (!$maintenance) {
    //         return response()->json(['message' => 'Maintenance record not found'], 404);
    //     }

    //     $maintenance->delete();
    //     return response()->json(['message' => 'Maintenance record deleted successfully'], 200);
    // }
}
