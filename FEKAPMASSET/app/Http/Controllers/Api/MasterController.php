<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Validated;
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

    // Edit method to show the form for editing the record
    public function edit($id) {
        // Fetch the master record using the $id
        $master = Master::findOrFail($id);
        
        // Return the edit view with the master data
        return view('master.edit', compact('master'));
    }

    public function store(Request $request){
        $validated = $request -> validate([
            'mastername' => 'required|string|max:255',
            'conditions' => 'required|string|max:255',
            'nosr' => 'required|string|max:255',
            'description' => 'required|string',
            'valuegcm' => 'required|numeric',
            'typegcm' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $client = new Client();

        try {
            $response = $client -> getBody();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // Destroy method to delete a record
    public function destroy($id) {
        // Fetch the master record using the $id
        $master = Master::findOrFail($id);

        // Perform the deletion
        $master->delete();
        
        // Redirect back to the index page with a success message
        return redirect()->route('master.index')->with('success', 'Master record deleted successfully.');
    }

    public function update(Request $request, $id) {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'mastername' => 'required|string|max:255',
            'conditions' => 'required|string|max:255',
            'nosr' => 'required|string|max:255',
            'description' => 'required|string',
            'valuegcm' => 'required|numeric',
            'typegcm' => 'required|string|max:255',
            'active' => 'boolean',
        ]);
    
        // Create a new HTTP client
        $client = new Client();
        
        try {
            // Send the PUT request to the API to update the master data
            $response = $client->request('PUT', "http://localhost:5252/api/Master/{$id}", [
                'json' => $validatedData // Send the validated data as JSON
            ]);
    
            // Optionally handle the response here (e.g., check if the update was successful)
            $responseBody = json_decode($response->getBody(), true);
    
            return response()->json(['message' => 'Record updated successfully', 'data' => $responseBody], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json(['message' => 'Failed to update record', 'error' => $e->getMessage()], 500);
        }
    }   
}
