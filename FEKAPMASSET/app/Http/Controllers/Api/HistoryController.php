<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            return view('history.index', ['masters' => $data]);

        } catch (\Exception $e) {
            return view('history.index', ['masters' => []])-> with($e);
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
    public function storesz(Request $request)
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
    public function update(Request $request, $id){        
        $validated = $request->validate([
            'assetcode' => 'required|string|max:255',
        ]);
        
        $client = new Client();

        try {
            $response = $client->post('http://localhost:5252/api/TrnAsset',[
                'json'=> $validated,
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
            return redirect('/dashboard')->with('success', 'Data submitted successfully!');
        }catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect('/master/create')->withErrors(['error' => 'An error occurred while submitting the data.']);
        }          
    }

    public function store (Request $request){
        $validated = $request -> validate([
            "IDASSETHISTORY"
        ]);

        $client = new Client();
        try {
            $response = $client -> post("http://localhost:5252/api/HistAsset", [
                'json' => $validated,
            ]);        
            $data = json_decode($response -> getBody() -> getContents(), true);
            Log::info("API Response: ", $data);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the data.']);
        }
    }
}
