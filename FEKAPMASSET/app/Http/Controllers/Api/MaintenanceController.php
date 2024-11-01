<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class MaintenanceController extends Controller
{
    // Get all maintenance records
    public function indexz() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TrnHistMaintenance');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        $assetResponse = $client->request('GET', 'http://localhost:5252/api/TrnAsset');
        $assetBody = $assetResponse->getBody();
        $assetContent = $assetBody->getContents();
        $assetData = json_decode($assetContent, true);

        $userResponse = $client->request('GET', 'http://localhost:5252/api/user');
        $userBody = $userResponse->getBody();
        $userContent = $userBody->getContents();
        $userData = json_decode($userContent, true);
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;
        $currentItems = array_slice($data, ($currentPage-1)*$perPage, $perPage);

        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            count($data), // Total items
            $perPage, // Items per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Maintain query parameters
        );

        return view('maintenance.index', [
            'maintenanceData' => $paginatedData,
            'assetData' => $assetData,
            'userData' => $userData  
        ]); // Keep the view name consistent
    }

    public function index($assetcode){
        //new guzzle http client
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnHistMaintenance/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $mtc = json_decode($contentAsset, true);

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://localhost:5252/api/user");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $user = json_decode($contentAssetSpec, true);

        //Third API call to fetch sidebar data (master)
        $responseMaster = $client->request('GET', "http://localhost:5252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $asset = json_decode($contentMaster, true);

        // Pass both assetData and assetSpecData to the view
        return view('maintenance.create', [
            // 'assetData' => $assetData,
            'assetcode' => $assetcode,
            'asset' => $asset,
            'mtc' => $mtc,
            'user' => $user,
        ]);
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

    // Store a new maintenance record
    public function store(Request $request, $assetcode){
        $validatedData = $request->validate([
            "assetcode"=> 'required',
            "picadded"=> 'required',
            "notes"=> 'required',
            "dateadded"=> 'required'
        ]);

        $client = new Client();

        try {
            $response = $client->post("http://localhost:5252/api/TrnHistMaintenance/{$assetcode}", [
                'json' => $validatedData,
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("API Response: ", $data);
            return redirect("/detailAsset/Laptop/{$assetcode}")->with('Success', 'success add device to maintenance' );

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect("/maintenance/create/{$assetcode}")->withErrors(['error' => 'An error occurred while submitting the data.']);
        }
    }

    // // Update an existing maintenance record
    // public function update(Request $request, $id)
    // {
    //       // Validate the incoming request data
    //       $validated = $request->validate([
    //         'idmaster' => 'required|integer',
    //         'condition' => 'required|string|max:255',
    //         'nosr' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'valuegcm' => 'required|numeric',
    //         'typegcm' => 'nullable|string|max:255', 
    //         'active' => 'required|string', 
    //     ]);
        
    //     $client = new Client();     
        
    //     try {
    //         // Send the PUT request to the API to update the master data
    //         $response = $client->PUT("http://localhost:5252/api/TrnHistMaintenance/{$id}", [
    //             'json' => $validated // Send the validated data as JSON
    //         ]);                                 

    //         $data = json_decode($response->getBody()->getContents(), true);
    //         Log::info('API Response:', $data);  // Log the API response for inspection
        
    //         return redirect('/master')->with('success', 'Data submitted successfully!');
    //     } catch (\GuzzleHttp\Exception\RequestException $e) {
    //         $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
    //         Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
    //         return redirect('/master/create')->withErrors(['error' => 'An error occurred while submitting the data.']);
    //     }   
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
