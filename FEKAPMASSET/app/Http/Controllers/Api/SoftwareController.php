<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SoftwareController extends Controller
{
    // Get all software records
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('detailAsset.Laptop', ['softwareData' => $data]); // Keep the view name consistent
    }

    public function edit($assetcode){
         // Create a new HTTP client instance
         $client = new Client();

         // First API call to fetch asset data (TrnAsset)
         $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
         $contentAsset = $responseAsset->getBody()->getContents();
         $assetData = json_decode($contentAsset, true);
 
         //Fetch PIC
         $responsePic = $client->request('GET', "http://localhost:5252/api/User");
         $contentPic = $responsePic->getBody()->getContents();
         $userData = json_decode($contentPic, true);  

         //Fetch Master
         $responseMst = $client->get("http://localhost:5252/api/master");
         $contentMst = $responseMst->getBody()->getContents();
         $mstData = json_decode($contentMst, true);

         //Fetch software
        //  $responseSoftware = $client -> request('GET', 'http://localhost:5252/api/TrnSoftware/{$assetcode}');
        //  $contentSoftware = $responseSoftware ->getBody()->getContents();
        //  $softwareData = json_decode($contentSoftware, true);
 
         // Pass both assetData and assetSpecData to the view
         return view('software.edit', [
             'assetcode' => $assetcode,
             'assetData' => $assetData,
             'userData' => $userData,
             'mstData' => $mstData,
            //  'softwareData' => $softwareData
         ]);

    }

    public function create($assetcode){
         // Create a new HTTP client instance
         $client = new Client();

         // First API call to fetch asset data (TrnAsset)
         $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
         $contentAsset = $responseAsset->getBody()->getContents();
         $assetData = json_decode($contentAsset, true);
 
         //Fetch PIC
         $responsePic = $client->request('GET', "http://localhost:5252/api/User");
         $contentPic = $responsePic->getBody()->getContents();
         $userData = json_decode($contentPic, true);  

         //Fetch Master
         $responseMst = $client->get("http://localhost:5252/api/master");
         $contentMst = $responseMst->getBody()->getContents();
         $mstData = json_decode($contentMst, true);

         //Fetch software
        //  $responseSoftware = $client -> request('GET', 'http://localhost:5252/api/TrnSoftware/{$assetcode}');
        //  $contentSoftware = $responseSoftware ->getBody()->getContents();
        //  $softwareData = json_decode($contentSoftware, true);
 
         // Pass both assetData and assetSpecData to the view
         return view('software.create', [
             'assetcode' => $assetcode,
             'assetData' => $assetData,
             'userData' => $userData,
             'mstData' => $mstData,
            //  'softwareData' => $softwareData
         ]);
    }

    public function store(Request $request){
        $validated = $request -> validate([
            'assetcode' => 'required',
            'softwaretype' => 'required',   
            'softwarecategory' => 'required',
            'softwarename' => 'required',
            'softwarelicense' => 'required',
            'softwareperiod'=> 'required',
            'active' => 'required',
            'picadded' => 'required',
            'dateadded' => 'nullable',
            'picupdated' => 'nullable',
            'dateupdated' => 'nullable',
            'trnasset' => 'nullable'
            ]);

        $client = new Client();
        $assetCodes = $validated['assetcode'];
        
        try {
            $response = $client->post("http://localhost:5252/api/TrnSoftware", [
                'json' => $validated,  // Use the validated data
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect("/detailAsset/Laptop/$assetCodes")->with("success", "Data has been added successfully");
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the data.']);
        }   
    }   

    public function update(Request $request, $assetcode, $idassetsoftware){
            Log::info('Update method called with assetcode: ' . $assetcode . ' and idassetsoftware: ' . $idassetsoftware);
            Log::info('Request Data:', $request->all());

        $validated = $request -> validate([
            'idassetsoftware' => 'required',
            'assetcode' => 'required',
            'softwaretype' => 'required',   
            'softwarecategory' => 'required',
            'softwarename' => 'required',   
            'softwarelicense' => 'required',
            'softwareperiod' => 'required',
            'active' => 'required',
            'picadded' => 'required',
            'dateadded' => 'nullable',
            'picupdated' => 'nullable',
            'dateupdated' => 'nullable',
            ]);

        $client = new Client();
        $assetCodes = $validated['assetcode'];
        
        try {
            $response = $client->put("http://localhost:5252/api/TrnSoftware/{$idassetsoftware}", [
                'json' => $validated,  // Use the validated data
            ]);
        
            $data = json_decode($response->getBody()->getContents(),  true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect()->back()->with("success", "Data has been updated successfully");
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the data.']);
        }   
    }

    public function delete(Request $request, $id){
        $validated = $request->validate([
            'active' => 'required|string|in:Y,N',  // Ensure active is either 'Y' or 'N'
        ]);

        $client = new Client();

        try {
            $response = $client->put("http://localhost:5252/api/TrnSoftware/{$id}", [
                'json' => $validated,
            ]);

            // Log the success response
            Log::info('Successfully updated software status', [
                'id' => $id,
                'response_status' => $response->getStatusCode(),
                'response_body' => json_decode($response->getBody(), true),
            ]);

            return response()->json(['message' => 'Successfully updated software status'], 200);

        } catch (\Throwable $th) {
            // Log detailed error response
            Log::error('Failed to update software status', [
                'id' => $id,
                'error_message' => $th->getMessage(),
                'error_code' => $th->getCode(),
            ]);

            return response()->json(['error' => 'Failed to update software status'], 500);
        }
    }
}
