<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations\Get;

class AssetController extends Controller
{
    //
    public function index() 
    {
        $client = new Client();
        $response = $client->request('get', 'http://localhost:5252/api/Log');
        $body = $response -> getBody();
        $content = $body -> getContents();
        $data = json_decode($content, true);
        
        // Check the contents of $data
           if (empty($data)) {
            dd('No data received from API');
        }    
  
        return view('dashboard', ['logData' => $data]);
    }

    public function create(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $masterData = json_decode($content, true);

        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TrnAsset');
        $body = $response->getBody()->getContents();
        $logData = json_decode($body, true);
        return view('dashboard', [
            'masterData' => $masterData,
            'logData' => $logData
        
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'assetcode' => 'required|string|max:255',
            'assettype' => 'required|string|max:255',
            'assetcategory' => 'required|string|max:255',
            'assetbrand' => 'required|string|max:255',
            'assetmodel' => 'required|string|max:255',
            'assetseries' => 'required|string|max:255',
            'assetserialnumber' => 'required|string|max:255',
            'active' => 'required|string|max:255',
        ]);

        $client = new Client();
        try{
            $response = $client->post('http://localhost:5252/api/TrnAsset',[
                'json'=> $validatedData,
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
}
