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

        // Pass both assetData and assetSpecData to the view
        return view('detailAsset.Laptop', [
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData
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
         $validatedData = $request->validate([
             'assetbrand' => 'required|string|max:255',
             'assetmodel' => 'required|string|max:255',
             'assetseries' => 'required|string|max:255',
             'assetserialnumber' => 'required|string|max:255',
             'active' => 'required|string|max:255',
             'assetcategory' => 'required|string|max:255',
             'assetcode' => 'required|string|max:255',
             'assettype' => 'required|string|max:255'            
        ]);

        $client = new Client();
        try{
            $response = $client->post('http://localhost:5252/api/TrnAsset', [
                'json' => $validatedData,
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