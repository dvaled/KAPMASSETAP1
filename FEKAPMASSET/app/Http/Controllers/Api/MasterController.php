<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use PDO;

class MasterController extends Controller
{
    // Fetch all data
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('master.index', ['masterData' => $data]); // Keep the view name consistent
    }

    public function show($condition){
        // Create a new HTTP client instance
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseMaster = $client->request('GET', "http://localhost:5252/api/Master/{$condition}");
        $contentMaster = $responseMaster->getBody()->getContents();
        $mastersData = json_decode($contentMaster, true);


        // Pass both assetData and assetSpecData to the view
        return view('master.index', [
            'masterData' => $mastersData,
        ]);
    }

    public function sidebar(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);
    
        // Pass the masterData to the view so that the sidebar can consume it
        return view('master.create', ['sidebarData' => $data]);
    }

    public function boot()
    {
        View::composer('layouts.sidebar', function ($view) {
            $client = new Client();
            $response = $client->request('GET', 'http://localhost:5252/api/Master');
            $body = $response->getBody();
            $content = $body->getContents();
            $data = json_decode($content, true);

            // Share the master data with the sidebar
            $view->with('masterData', $data);
        });
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'condition' => 'required|string|max:255',
            'nosr' => 'required|numeric',
            'description' => 'required|string',
            'valuegcm' => 'required|numeric',
            'typegcm' => 'nullable|string|max:255', // Use 'nullable' if this field can be optional
            'active' => 'required|string',
            'sbarcondition' => 'required|string|max:255',
        ]);

        $client = new Client();

        try {
            $response = $client->post('http://localhost:5252/api/master', [
                'json' => $validated,  // Use the validated data
            ]);
        
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect('/master')->with('success', 'Data submitted successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect('/master/create')->withErrors(['error' => 'An error occurred while submitting the data.']);
        }    
    }

    // Edit method to show the form for editing the record
    public function edit($id) {
        // Fetch the master record using the $id
        $master = Master::findOrFail($id);  
        
        // Return the edit view with the master data
        return view('master.edit', compact('master'));
    }


    // Destroy method to delete a record
    public function destroy($masterid, Request $request) {

        /// Validate the incoming request data
        $validated = $request->validate([ 
            'active' => 'required|string', 
        ]);
        
        $client = new Client();     

        try {
            // Send the PUT request to the API to update the master data
            $response = $client->post('PUT', "http://localhost:5252/api/Master/{$masterid}", [
                'json' => $validated // Send the validated data as JSON
            ]);                                 
    
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect('/master')->with('success', 'Data submitted successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect('/master')->withErrors(['error' => 'An error occurred while submitting the data.']);
        }    
    }

    public function update(Request $request, $id) {
        // Validate the incoming request data
        $validated = $request->validate([
            'idmaster' => 'required|integer',
            'condition' => 'required|string|max:255',
            'nosr' => 'required|string|max:255',
            'description' => 'required|string',
            'valuegcm' => 'required|numeric',
            'typegcm' => 'nullable|string|max:255', 
            'active' => 'required|string', 
        ]);
        
        $client = new Client();     
        
        try {
            // Send the PUT request to the API to update the master data
            $response = $client->post('PUT', "http://localhost:5252/api/Master/{$id}", [
                'json' => $validated // Send the validated data as JSON
            ]);                                 
    
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $data);  // Log the API response for inspection
        
            return redirect('/master')->with('success', 'Data submitted successfully!');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect('/master/create')->withErrors(['error' => 'An error occurred while submitting the data.']);
        }    
    }   
}
