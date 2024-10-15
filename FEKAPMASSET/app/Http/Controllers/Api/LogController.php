<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Log;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LogController extends Controller
{
    // Get all log records
    public function index(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Log');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);    
        
        // Check the contents of $data
        if (empty($data)) {
            dd('No data received from API');
        }

        
        return view('log.index', ['logData' => $data]);
    }
    

    // Get a specific log record by ID
    public function show($id)
    {
        $log = Log::with(['User'])->find($id);

        if (!$log) {
            return response()->json(['message' => 'Log record not found'], 404);
        }

        return response()->json($log, 200);
    }

    // Store a new log record
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "LOGID" => 'required',
            "ASSETID" => 'required',
            "ROLE" => 'required',
            "ACTIONPERFORMED"=> 'required',
            "USERADDED" => 'required',
            "DATEADDED" => 'required'
        ]);
        $log = Log::create($validatedData);
        return response()->json(['message' => 'Log record created successfully', 'data' => $log], 201);
    }

    // Update an existing log record
    public function update(Request $request, $id)
    {
        $log = Log::find($id);

        if (!$log) {
            return response()->json(['message' => 'Log record not found'], 404);
        }

        $validatedData = $request->validate([
            'LogID' => 'required',
            'AssetID' => 'required',
            'RoleID' => 'required',
            'ActionPerformed' => 'required',
            'UserAdded' => 'required|integer',
            'DateAdded' => 'required|date',
        ]);

        $log->update($validatedData);
        return response()->json(['message' => 'Log record updated successfully', 'data' => $log], 200);
    }

    // Delete a log record
    public function destroy($id)
    {
        $log = Log::find($id);

        if (!$log) {
            return response()->json(['message' => 'Log record not found'], 404);
        }

        $log->delete();
        return response()->json(['message' => 'Log record deleted successfully'], 200);
    }
}

