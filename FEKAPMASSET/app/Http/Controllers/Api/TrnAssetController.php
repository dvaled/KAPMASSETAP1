<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TRNAssetController extends Controller
{
    public function create()
    {
        return view('trnasset.create');
    }

    public function show($assetcode)
    {
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

        // Pass both assetData and assetSpecData to the view
        return view('detailAsset.Laptop', [
            'assetData' => $assetData,
            'assetSpecData' => $assetSpecData,
            'historyMaintenanceData' => $historyMaintenanceData
        ]);
    }
    
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('detailAsset.Laptop', ['masterData' => $data]); // Keep the view name consistent
    }


    public function store(Request $request)
    {
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

}