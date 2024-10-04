<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    // Get all history records
    public function index()
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:5252/api/AssetHistory');
            $body = $response->getBody();
            $content = $body->getContents();
            $data = json_decode($content, true);

            if (!is_array($data)) {
                $data = []; 
            }

            return view('master.index', ['masters' => $data]);

        } catch (\Exception $e) {
            return view('master.index', ['masters' => []])-> with($e);
        }
    }

    // Get a specific history record by ID
    public function show($id)
    {
        $historyRecord = History::with(['Employee', 'User'])->find($id);

        if (!$historyRecord) {
            return response()->json(['message' => 'History record not found'], 404);
        }

        return response()->json($historyRecord, 200);
    }

    // Store a new history record
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "IDASSETHISTORY" => "Required",
            "IDASSET" => "Required" ,
            "NIPP" => "Required",
            "NAME" => "Required",
            "POSITION" => "Required",
            "UNIT" => "Required",
            "DEPARTMENT" => "Required",
            "DIRECTORATE" => "Required",
            "PICADDED" => "Required",
            "DATEADDED" => "Required",
            "DATEUPDATED" => "Required"
        ]);

        $historyRecord = History::create($validatedData);
        return response()->json(['message' => 'History record created successfully', 'data' => $historyRecord], 201);
    }

    // Update an existing history record
    public function update(Request $request, $id)
    {
        $historyRecord = History::find($id);

        if (!$historyRecord) {
            return response()->json(['message' => 'History record not found'], 404);
        }

        $validatedData = $request->validate([
            'IdAssetHistory' => 'required',
            'IdAsset' => 'required',
            'NIPP' => 'required',
            'Name' => 'required',
            'Position' => 'required',
            'Unit' => 'required',
            'Department' => 'required',
            'Directorate' => 'required',
            'PICAdded' => 'required|integer',
            'DateAdded' => 'required|date',
            'DateUpdated' => 'required|date',
        ]);

        $historyRecord->update($validatedData);
        return response()->json(['message' => 'History record updated successfully', 'data' => $historyRecord], 200);
    }

    // Delete a history record
    public function destroy($id)
    {
        $historyRecord = History::find($id);

        if (!$historyRecord) {
            return response()->json(['message' => 'History record not found'], 404);
        }

        $historyRecord->delete();
        return response()->json(['message' => 'History record deleted successfully'], 200);
    }
}
