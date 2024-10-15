<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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
            // 'assetData' => $assetData,
            // 'assetSpecData' => $assetSpecData,
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
        $data = json_decode($content, true);
    
        // Pass the masterData to the view so that the sidebar can consume it
        return view('Transaction.create', ['sidebarData' => $data]);
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

        $resposeHistoryMaintenance = $client->request('GET', "http://localhost:5252/api/TrnHistMaintenance/{$assetcode}");
        $contentHistoryMaintenance = $resposeHistoryMaintenance->getBody()->getContents();
        $historyMaintenanceData = json_decode($contentHistoryMaintenance, true);

        $responseDetailSoftware = $client->request('GET', "http://localhost:5252/api/TrnSoftware/{$assetcode}");
        $contentDetailSoftware = $responseDetailSoftware->getBody()->getContents();
        $detailSoftwareData = json_decode($contentDetailSoftware, true);

        // Pass both assetData and assetSpecData to the view
        return view('detailAsset.Laptop', [
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'historyMaintenanceData' => $historyMaintenanceData,
            'detailSoftwareData' => $detailSoftwareData
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

    //Store new asset
    public function store(Request $request){
        // Validate the incoming data
        $validatedData = $request->validate([
            'ASSETCATEGORY' => 'required|string|max:255',
            'ASSETTYPE' => 'required|string|max:255',
            'ASSETBRAND' => 'required|string|max:255',
            'ASSETMODEL' => 'required|string|max:255',
            'ASSETSERIES' => 'required|string|max:255',
            'ASSETSERIALNUMBER' => 'required|string|max:255',
            'ADDEDDATE' => 'required|date',
            'ACTIVE' => 'required|string|in:YES,NO',
            'NIPP' => 'nullable|integer',
            'ASSETCODE' => 'nullable|integer',
        ]);

        // Prepare data for initial API request (without ASSETCODE)
        $data = [
            'ASSETCATEGORY' => $validatedData['ASSETCATEGORY'],
            'ASSETTYPE' => $validatedData['ASSETTYPE'],
            'ASSETBRAND' => $validatedData['ASSETBRAND'],
            'ASSETMODEL' => $validatedData['ASSETMODEL'],
            'ASSETSERIES' => $validatedData['ASSETSERIES'],
            'ASSETSERIALNUMBER' => $validatedData['ASSETSERIALNUMBER'],
            'ADDEDDATE' => Carbon::parse($validatedData['ADDEDDATE'])->toDateString(),
            'ACTIVE' => $validatedData['ACTIVE'],
            'NIPP' => $validatedData['NIPP'] ?? null,
        ];

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
                return redirect()->route('trnasset.index')->with('success', 'Asset created successfully!');
            } else {
                return back()->withErrors(['message' => 'Failed to update asset with ASSETCODE.'])->withInput();
            }
        } else {
            // Handle error response from the initial POST request
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

    // Send POST request to the external API to assign the asset to an employee
    $response = Http::post('http://localhost:5252/api/AssignAsset', $data);

    // Check if the API request was successful
    if ($response->successful()) {
        return redirect()->route('asset.index')->with('success', 'Asset assigned successfully!');
    } else {
        // Handle error response from the API
        return back()->withErrors(['message' => 'Failed to assign asset. Please try again.'])->withInput();
    }
}


}