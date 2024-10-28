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

    public function store(Request $request  ){
        $validated = $request -> validate([
            'idasset' => 'required',
            'softwaretype' => 'required',   
            'softwarecategory' => 'required',
            'softwarename' => 'required',
            'softwarelicense' => 'required',
            'active' => 'required',
            'picadded' => 'required',
            'dateadded' => 'nullable',
            'picupdated' => 'nullable',
            'dateupdated' => 'nullable',
            ]);

        $client = new Client();
        
        try {
            $response = $client->post('http://localhost:5252/api/TrnSoftware', [
                'json' => $validated,  // Use the validated data
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect('/detaiAsset/Laptop/{assetcode}')->with('success', 'Data submitted successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the data.']);
        }   
    }   

    public function update(Request $request, $id){
        $validated = $request -> validate([
            'idasset' => 'required',
            'softwaretype' => 'required',   
            'softwarecategory' => 'required',
            'softwarename' => 'required',
            'softwarelicense' => 'required',
            'active' => 'required',
            'picadded' => 'required',
            'dateadded' => 'nullable',
            'picupdated' => 'nullable',
            'dateupdated' => 'nullable',
            ]);

        $client = new Client();
        
        try {
            $response = $client->post('http://localhost:5252/api/TrnSoftware/{$id}', [
                'json' => $validated,  // Use the validated data
            ]);
        
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect('/detaiAsset/Laptop/{assetcode}')->with('success', 'Data Updated successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the data.']);
        }   
    }
}
