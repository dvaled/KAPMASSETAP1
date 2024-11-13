<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

use function Symfony\Component\Clock\now;

class MaintenanceController extends Controller{
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
        $perPage = 7;
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
        ]);

        $client = new Client();

        try {
            $validatedData['dateadded'] = now()->format('Y-m-d H:i:s');
            $response = $client->post("http://localhost:5252/api/TrnHistMaintenance/{$assetcode}", [
                'query' => $validatedData,
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

    public function print() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TrnHistMaintenance');
        $body = $response->getBody();
        $content = $body->getContents();
        $mtcData = json_decode($content, true);

        $assetResponse = $client->request('GET', 'http://localhost:5252/api/TrnAsset');
        $assetBody = $assetResponse->getBody();
        $assetContent = $assetBody->getContents();
        $assetData = json_decode($assetContent, true);

        $userResponse = $client->request('GET', 'http://localhost:5252/api/user');
        $userBody = $userResponse->getBody();
        $userContent = $userBody->getContents();
        $userData = json_decode($userContent, true);
        
        $data = [
            'userData' => $userData, // This key should match what you use in your view
        ];
        
        
        // Log::info($userData); // Log the data to check what is being passed
        // return view('maintenance.preview', [
        //     'assetData' => $assetData,
        //     'userData' => $userData,  
        //     'mtcData' => $mtcData
        // ]); // Keep the view name consistent

        $pdf = Pdf::loadView('maintenance.preview', $data);
        return $pdf->download('users-lists.pdf');
    }
}
