<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TRNAssetController extends Controller
{

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
    public function newAssetView(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $sidebarData = json_decode($content, true);

        // Pass the masterData to the view so that the sidebar can consume it
        return view('Transaction.create', [
            'sidebarData' => $sidebarData,
        ]);
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
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'historyMaintenanceData' => $historyMaintenanceData,
            'detailSoftwareData' => $detailSoftwareData,
            'userData' => $userData,
            'imgData' => $imgData,
            'histData' => $histData,
        ]);
    }

    // Still returns below error
    // [2024-10-28 07:37:44] local.ERROR: Initial API request failed: {"response":"{\"type\":\"https://tools.ietf.org/html/rfc9110#section-15.5.1\",\"title\":\"One or more validation errors occurred.\",\"status\":400,\"errors\":{\"$\":[\"JSON deserialization for type 'TRNASSETMODEL' was missing required properties, including the following: assetcode, condition, employee\"],\"trnAsset\":[\"The trnAsset field is required.\"]},\"traceId\":\"00-b422a4b47d27dcae0d3c550e92371f19-0f3fdbeb4bbacd7b-00\"}"} 
    //Store new asset
    public function store(Request $request){
        // Validate the incoming data
        $validatedData = $request->validate([
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'active' => 'required|string',
            'assetcategory' => 'required|string|max:255',
            'assetcode' => 'nullable|integer',
            'assettype' => 'required|string|max:255',
            'addeddate' => 'nullable|date',
            'nipp' => 'nullable|integer',
        ]);

        // Prepare data for initial API request (without ASSETCODE)
    $data = [
        'ASSETCATEGORY' => $validatedData['assetcategory'],
        'ASSETTYPE' => $validatedData['assettype'],
        'ASSETBRAND' => $validatedData['assetbrand'],
        'ASSETMODEL' => $validatedData['assetmodel'],
        'ASSETSERIES' => $validatedData['assetseries'],
        'ASSETSERIALNUMBER' => $validatedData['assetserialnumber'],
        'ADDEDDATE' => isset($validatedData['addeddate']) ? Carbon::parse($validatedData['addeddate'])->toDateString() : now()->toDateString(),
        'ACTIVE' => $validatedData['active'],
        'NIPP' => $validatedData['nipp'] ?? null,
    ];

        // Send POST request to the external API to create asset (without ASSETCODE)
        $response = Http::post('http://localhost:5252/api/TrnAsset', $data);

        if ($response->successful()) {
            $assetId = $response->json('id');  // Assuming the API returns the new ID in the response

            if (!$assetId) {
                Log::error('API response did not contain an ID:', ['response' => $response->json()]);
                return back()->withErrors(['message' => 'Failed to retrieve asset ID from API response.'])->withInput();
            }

            // Generate the ASSETCODE using ASSETCATEGORY, ASSETTYPE, ADDEDDATE, and IDASSET
            $addedDate = Carbon::parse($data['ADDEDDATE'])->format('Ymd');
            $assetCode = $validatedData['assetcategory'] . $validatedData['assettype'] . $addedDate . str_pad($assetId, 4, '0', STR_PAD_LEFT);

            // Prepare data to update the asset with the generated ASSETCODE
            $updateData = ['ASSETCODE' => $assetCode];

            // Send PATCH request to update the asset with the new ASSETCODE
            $updateResponse = Http::patch("http://localhost:5252/api/TrnAsset/{$assetId}", $updateData);

            if ($updateResponse->successful()) {
                return redirect()->route('trnasset.index')->with('success', 'Asset created successfully!');
            } else {
                Log::error('Failed to update asset with ASSETCODE:', ['response' => $updateResponse->body()]);
                return back()->withErrors(['message' => 'Failed to update asset with ASSETCODE.'])->withInput();
            }
        } else {
            Log::error('Initial API request failed:', ['response' => $response->body()]);
            return back()->withErrors(['message' => 'Failed to create asset.'])->withInput();
        }
        // Send POST request to the external API to create asset (without ASSETCODE)
            $response = Http::post('http://localhost:5252/api/TrnAsset', $data);

            // Check if the API request was successful
            if ($response->successful()) {
                // Get the newly created asset's ID from the API response
                $assetId = $response->json('id');  // Assuming the API returns the new ID in the response

                // Generate the ASSETCODE using ASSETCATEGORY, ASSETTYPE, ADDEDDATE, and IDASSET
                $addedDate = Carbon::parse($validatedData['ADDEDDATE'])->format('Ymd');
                $assetCode = $validatedData['ASSETCATEGORY'] . $validatedData['ASSETTYPE'] . $addedDate . str_pad($assetId, 4, '0', STR_PAD_LEFT);

                // Prepare data to update the asset with the generated ASSETCODE
                $updateData = ['ASSETCODE' => $assetCode];

                // Send PATCH request to update the asset with the new ASSETCODE
                $updateResponse = Http::patch("http://localhost:5252/api/TrnAsset/{$assetId}", $updateData);

                if ($updateResponse->successful()) {
                    Log::info('Validated Data:', $validatedData);
                    return redirect()->route('trnasset.index')->with('success', 'Asset created successfully!');
                } else {
                    Log::info('Validated Data:', $validatedData);
                    return back()->withErrors(['message' => 'Failed to update asset with ASSETCODE.'])->withInput();
                }
            } else {
                // Handle error response from the initial POST request
                Log::info('Validated Data:', $validatedData);
                return back()->withErrors(['message' => 'Failed to create asset.'])->withInput();
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
        // Validate the incoming data
        $validatedData = $request->validate([
            'NIPP' => 'required|integer',            
        ]);

        // Prepare data to send to the API for unassignment (setting NIPP to null)
        $data = [
            'NIPP' => null, // Unassigning by setting NIPP to null
        ];

        // 1. Send PUT request to unassign the asset (set NIPP to null)
        $response = Http::put("http://localhost:5252/api/TrnAsset/{$assetcode}", $data);
        Log::info('Validated Data:', $validatedData);

        // Check if the unassignment was successful before logging history
        if ($response->successful()) {
            // 2. If successful, log the unassignment in the asset history API
            $historyResponse = Http::post('http://localhost:5252/api/AssetHistory', [
                'asset_code' => $assetcode,
                'user_id' => $validatedData['NIPP'],
                'status' => 'unassigned', // Status for unassignment
                'timestamp' => now(),
            ]);
            Log::info('Validated Data:', $validatedData);

            // Log success or error based on the history logging response
            if ($historyResponse->successful()) {
                Log::info('Validated Data:', $validatedData);
                return redirect()->route('transaction.index')->with('success', 'Asset unassigned and logged successfully!');
            } else {
                Log::info('Validated Data:', $validatedData);
                return back()->withErrors(['message' => 'Asset unassigned, but failed to log in history.'])->withInput();
            }
        } else {
            // Handle error response from the unassignment API
            Log::info('Validated Data:', $validatedData);
            return back()->withErrors(['message' => 'Failed to unassign asset. Please try again.'])->withInput();
        }
    }


}