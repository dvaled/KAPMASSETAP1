<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TRNAssetController extends Controller
{
    public function AssignView($assetCode){
        //new guzzle http client
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{ $assetCode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetCode}");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $assetSpecData = json_decode($contentAssetSpec, true);

        //Third API call to fetch sidebar data (master)
        $responseMaster = $client->request('GET', "http://localhost:5252/api/master");
        $contentMaster = $responseMaster->getBody()->getContents();
        $masterData = json_decode($contentMaster, true);

        //Fourth API call to fetch employee data
        $responseEmployee = $client->request('GET', "http://localhost:5252/api/Employee");
        $contentEmployee = $responseEmployee->getBody()->getContents();
        $employeeData = json_decode($contentEmployee, true);

        // Pass both assetData and assetSpecData to the view
        return view('transaction.assign', [
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'masterData' => $masterData,
            'employeeData' => $employeeData,
        ]);
    }


    //Create new asset view
    // public function newAssetView(){
    //     $client = new Client();
    //     $response = $client->request('GET', 'http://localhost:5252/api/Master');
    //     $body = $response->getBody();
    //     $content = $body->getContents();
    //     $data = json_decode($content, true);

    //     // Pass the masterData to the view so that the sidebar can consume it
    //     return view('Transaction.create', ['sidebarData' => $data]);
    // }

    public function msttrnasset() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('transaction.asset', [
            'optionData' => $data]); // Keep the view name consistent
    }

    public function updateData($id, $newData)
    {
        // Define the .NET API endpoint URL
        $url = "https://your-dotnet-api.com/api/resource/{$id}";

        // Send the PUT request
        $response = Http::put($url, [
            'Property1' => $newData['property1'],
            'Property2' => $newData['property2'],
            // Include other properties as required by the .NET API
        ]);

        // Handle the response
        if ($response->successful()) {
            return response()->json(['message' => 'Data updated successfully.'], 200);
        } else {
            return response()->json(['message' => 'Failed to update data.'], $response->status());
        }
    }

    public function show($assetcode){
        // Create a new HTTP client instance
        $client = new Client();

        $responseMaster = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
        $contentMaster = $responseMaster->getBody()->getContents();
        $assetMaster = json_decode($contentMaster, true);
        

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);
        

        // Second API call to fetch asset spec data (TrnAssetSpec)
        $responseAssetSpec = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetcode}");
        $contentAssetSpec = $responseAssetSpec->getBody()->getContents();
        $assetSpecData = json_decode($contentAssetSpec, true);

        // Fetch History Maintenance
        $resposeHistoryMaintenance = $client->request('GET', "http://localhost:5252/api/TrnHistMaintenance/{$assetcode}");
        $contentHistoryMaintenance = $resposeHistoryMaintenance->getBody()->getContents();
        $historyMaintenanceData = json_decode($contentHistoryMaintenance, true);

        // Fetch Software Installed
        $responseDetailSoftware = $client->request('GET', "http://localhost:5252/api/TrnSoftware/{$assetcode}");
        $contentDetailSoftware = $responseDetailSoftware->getBody()->getContents();
        $detailSoftwareData = json_decode($contentDetailSoftware, true);

        //Fetch PIC
        $responsePic = $client->request('GET', "http://localhost:5252/api/User");
        $contentPic = $responsePic->getBody()->getContents();
        $userData = json_decode($contentPic, true);  

        //Fetch History Asset
        $responseHist = $client->request('GET', "http://localhost:5252/api/AssetHistory/{$assetcode}");
        $contentHist = $responseHist->getBody()->getContents();
        $histData = json_decode($contentHist, true);  

        //fetch image
        $responseImg = $client->request('GET', "http://localhost:5252/api/TrnAssetDtlPicture/{$assetcode}");
        $contentImg = $responseImg->getBody()->getContents();
        $imgData = json_decode($contentImg, true);  

        // Pass both assetData and assetSpecData to the view
        return view('detailAsset.Laptop', [
            'assetMaster' => $assetMaster,
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'historyMaintenanceData' => $historyMaintenanceData,
            'detailSoftwareData' => $detailSoftwareData,
            'userData' => $userData,
            'histData' => $histData,
            'imgData' => $imgData
        ]);
    }
    public function index($assetcode) {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $masterData = json_decode($content, true);

        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        return view('detailAsset.Laptop', [
            'masterData' => $masterData,
            'assetData' => $assetData
        ]); // Keep the view name consistent
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'assettype' => 'required|string|max:255',
            'assetcategory' => 'required|string|max:255',
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'picadded' => 'required|string|max:255',
        ]);

        // Initialize the HTTP client for making requests
        $client = new \GuzzleHttp\Client();

        try {
            // Send POST request directly using the validated data
            $response = $client->post("http://localhost:5252/api/TrnAsset", [
                'json' => [
                    'idasset' => '0',
                    'assetcode' => 'assetcode',
                    'assettype' => $validated['assettype'],
                    'assetcategory' => $validated['assetcategory'],
                    'assetbrand' => $validated['assetbrand'],
                    'assetmodel' => $validated['assetmodel'],
                    'assetseries' => $validated['assetseries'],
                    'assetserialnumber' => $validated['assetserialnumber'],
                    'picadded' => $validated['picadded'],
                    'condition' => 'GREAT',
                    'active' => 'Y',
                    'nipp' => null,
                    'picupdated' => null,
                ]
            ]);

            // Retrieve the response data and log for debugging
            $responseData = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $responseData);

            // Get the assetcode from the response
            $assetcode = $responseData['assetcode'];
            $category = $responseData['assetcategory'];

            // Check if the API response was successful and redirect accordingly
            if ($category == 'LAPTOP') {
                return redirect()->route('transaction.trnlaptop', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else if ($category == 'MOBILE') {
                return redirect()->route('transaction.mobile', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else {
                return redirect()->route('transaction.others', ['assetcategory' => $category, 'assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            }
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle error response, log the error message, and show the error to the user
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);

            return back()->withErrors(['error' => 'Failed to create asset. Please try again.'])->withInput();
        }
    }


    public function assignAsset(Request $request){
        // Validate the incoming data
        $validatedData = $request->validate([
            'NIPP' => 'required|integer',
            'ASSETCODE' => 'required|string', // Assuming you are assigning an asset based on its code
        ]);

        // Prepare data to send to the API
        $data = [
            'NIPP' => $validatedData['NIPP'],
            'ASSETCODE' => $validatedData['ASSETCODE'], // Include asset code in the request
        ];

        // 1. Send POST request to assign the asset to an employee
        $response = Http::post('http://localhost:5252/api/AssignAsset', $data);

        // Check if the asset assignment was successful before logging history
        if ($response->successful()) {
            // 2. If successful, log the assignment in the asset history API
            $historyResponse = Http::post('http://localhost:5252/api/AssetHistory', [
                'asset_code' => $validatedData['ASSETCODE'],
                'user_id' => $validatedData['NIPP'],
                'status' => 'assigned',
                'timestamp' => now(),
            ]);

            // Log success or error based on the history logging response
            if ($historyResponse->successful()) {
                return redirect()->route('asset.index')->with('success', 'Asset assigned and logged successfully!');
            } else {
                return back()->withErrors(['message' => 'Asset assigned, but failed to log in history.'])->withInput();
            }
        } else {
            // Handle error response from the assignment API
            return back()->withErrors(['message' => 'Failed to assign asset. Please try again.'])->withInput();
        }
    } 

    public function unassignAsset(Request $request, $assetcode){
        try {
            // Enhanced validation for 'NIPP' field
            $validatedData = $request->validate([
                'NIPP' => 'nullable|integer',
            ]);
        } catch (ValidationException $e) {
            // Log validation errors and return a JSON response
            Log::error('Validation errors:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Prepare data to send to the API for unassignment (setting NIPP to null)
        $data = [
            'NIPP' => null, // Unassigning by setting NIPP to null
        ];

        // Send PUT request to unassign the asset (set NIPP to null)
        $response = Http::patch("http://localhost:5252/api/TrnAsset/{$assetcode}", $data);
        Log::info('Data sent for unassignment:', ['assetcode' => $assetcode, 'data' => $data]);

        // Check if the unassignment was successful before logging history
        if ($response->successful()) {
            // Log the unassignment in the asset history API if successful
            $historyData = [
                'asset_code' => $assetcode,
                'user_id' => $validatedData['NIPP'],
                'status' => 'unassigned', // Status for unassignment
                'timestamp' => now(),
            ];

            $historyResponse = Http::post('http://localhost:5252/api/AssetHistory', $historyData);
            Log::info('Data sent to history log:', $historyData);

            if ($historyResponse->successful()) {
                Log::info('Asset unassigned and history logged successfully.', ['assetcode' => $assetcode]);
                return redirect()->route('transaction.index')->with('success', 'Asset unassigned and logged successfully!');
            } else {
                Log::error('Failed to log history for unassigned asset.', ['assetcode' => $assetcode, 'response' => $historyResponse->body()]);
                return back()->withErrors(['message' => 'Asset unassigned, but failed to log in history.'])->withInput();
            }
        } else {
            // Log any errors that occurred during unassignment
            Log::error('Failed to unassign asset.', [
                'assetcode' => $assetcode,
                'response_status' => $response->status(),
                'response_body' => $response->body(),
                'request_data' => $data,
            ]);
            return back()->withErrors(['message' => 'Failed to unassign asset. Please try again.'])->withInput();
        }
    }


}