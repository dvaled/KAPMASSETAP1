<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class  TRNAssetSpecController extends Controller
{


    public function show($assetcode) {
        $client = new Client();
        $response = $client->request('GET', "http://localhost:5252/api/TrnAssetSpec/{$assetcode}");
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);
    
        // Check if $data is indeed an array or a single asset object
        return view('detailAsset.Laptop', ['assetSpecData' => $data]); // Directly pass the asset data
    }

    public function msttrnassetspec($assetcategory, $assetcode) {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('transaction.trnlaptop', [
            'assetcode' => $assetcode,  
            'assetcategory' => $assetcategory,
            'optionData' => $data]); // Keep the view name consistent
    }

    public function edit($assetcategory, $assetcode, $idassetspec) {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('transaction.update', [
            'assetcode' => $assetcode,  
            'assetcategory' => $assetcategory,
            'idassetspec' => $idassetspec,
            'optionData' => $data]); // Keep the view name consistent
    }
    
    public function store(Request $request, $assetcode)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'assetcode' => 'nullable|string|max:255',
            'assetcategory' => 'nullable|string|max:255',
            'processorbrand' => 'nullable|string|max:255',
            'processormodel' => 'nullable|string|max:255',
            'processorseries' => 'nullable|string|max:255',
            'memorytype' => 'nullable|string|max:255',
            'memorybrand' => 'nullable|string|max:255',
            'memorymodel' => 'nullable|string|max:255',
            'memoryseries' => 'nullable|string|max:255',
            'memorycapacity' => 'nullable|string|max:255',
            'storagetype' => 'nullable|string|max:255',
            'storagebrand' => 'nullable|string|max:255',
            'storagemodel' => 'nullable|string|max:255',
            'storagecapacity' => 'nullable|string|max:255',
            'graphicstypE1' => 'nullable|string|max:255',
            'graphicsbranD1' => 'nullable|string|max:255',
            'graphicsmodeL1' => 'nullable|string|max:255',
            'graphicsserieS1' => 'nullable|string|max:255',
            'graphicscapacitY1' => 'nullable|string|max:255',
            'graphicstypE2' => 'nullable|string|max:255',
            'graphicsbranD2' => 'nullable|string|max:255',
            'graphicsmodeL2' => 'nullable|string|max:255',
            'graphicsserieS2' => 'nullable|string|max:255',
            'graphicscapacitY2' => 'nullable|string|max:255',
            'screenresolution' => 'nullable|string|max:255',
            'touchscreen' => 'nullable|boolean',
            'backlightkeyboard' => 'nullable|boolean',
            'convertible' => 'nullable|boolean',
            'webcamera' => 'nullable|boolean',
            'speaker' => 'nullable|boolean',
            'microphone' => 'nullable|boolean',
            'wifi' => 'nullable|boolean',
            'bluetooth' => 'nullable|boolean',
        ]);

        // Initialize the HTTP client for making requests
        $client = new \GuzzleHttp\Client();
        
        $touchsreen = filter_var($validated['touchscreen'], FILTER_VALIDATE_BOOLEAN);
        $backlightkeyboard = filter_var($validated['backlightkeyboard'], FILTER_VALIDATE_BOOLEAN);
        $convertible = filter_var($validated['convertible'], FILTER_VALIDATE_BOOLEAN);
        $webcamera = filter_var($validated['webcamera'], FILTER_VALIDATE_BOOLEAN);
        $speaker = filter_var($validated['speaker'], FILTER_VALIDATE_BOOLEAN);
        $microphone = filter_var($validated['microphone'], FILTER_VALIDATE_BOOLEAN);
        $wifi = filter_var($validated['wifi'], FILTER_VALIDATE_BOOLEAN);
        $bluetooth = filter_var($validated['bluetooth'], FILTER_VALIDATE_BOOLEAN);
        
        try {
            // Send POST request directly using the validated data
            $response = $client->post("http://localhost:5252/api/TrnAssetSpec/{$assetcode}", [
                'json' => [
                    'idassetspec' => '0',
                    'assetcode' => $validated['assetcode'],
                    'processorbrand' => $validated['processorbrand'],
                    'processormodel' => $validated['processormodel'],
                    'processorseries' => $validated['processorseries'],
                    'memorytype' => $validated['memorytype'],
                    'memorybrand' => $validated['memorybrand'],
                    'memorymodel' => $validated['memorymodel'],
                    'memoryseries' => $validated['memoryseries'],
                    'memorycapacity' => $validated['memorycapacity'],
                    'storagetype' => $validated['storagetype'],
                    'storagebrand' => $validated['storagebrand'],
                    'storagemodel' => $validated['storagemodel'],
                    'storagecapacity' => $validated['storagecapacity'],
                    'graphicstypE1' => $validated['graphicstypE1'],
                    'graphicsbranD1' => $validated['graphicsbranD1'],
                    'graphicsmodeL1' => $validated['graphicsmodeL1'],
                    'graphicsserieS1' => $validated['graphicsserieS1'],
                    'graphicscapacitY1' => $validated['graphicscapacitY1'],
                    'graphicstypE2' => $validated['graphicstypE2'],
                    'graphicsbranD2' => $validated['graphicsbranD2'],
                    'graphicsmodeL2' => $validated['graphicsmodeL2'],
                    'graphicsserieS2' => $validated['graphicsserieS2'],
                    'graphicscapacitY2' => $validated['graphicscapacitY2'],
                    'screenresolution' => $validated['screenresolution'],
                    'touchscreen' => $touchsreen,
                    'backlightkeyboard' => $backlightkeyboard,
                    'convertible' => $convertible,
                    'webcamera' => $webcamera,
                    'speaker' => $speaker,
                    'microphone' => $microphone,
                    'wifi' => $wifi,
                    'bluetooth' => $bluetooth,
                    'picadded' => 'Dava',
                    'active' => 'Y',
                ]
            ]);

            // Retrieve the response data and log for debugging
            $responseData = json_decode($response->getBody()->getContents(), true);
            Log::info('API Response:', $responseData);

            // Get the assetcode from the response
            $assetcode = $responseData['assetcode'];
            $category = $validated['assetcategory'];

            // Check if the API response was successful and redirect accordingly
            if ($category == 'LAPTOP') {
                return redirect()->route('detailAsset.laptop', ['assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else if ($category == 'MOBILE') {
                return redirect()->route('detailAsset.mobile', ['assetcode' => $assetcode])
                                 ->with('success', 'Asset created successfully!');
            } else {
                return redirect()->route('detailAsset.others', ['assetcode' => $assetcode])
                                ->with('success', 'Asset created successfully!');}
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle error response, log the error message, and show the error to the user
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);

            return back()->withErrors(['error' => 'Failed to create asset. Please try again.'])->withInput();
        }
    }
    
    public function update(Request $request, $assetcode, $idassetspec){
        Log::info('Update method called with assetcode: ' . $assetcode . ' and idassetsoftware: ' . $idassetspec);
        Log::info('Request Data:', $request->all());

        // Validate the incoming request data
        $validated = $request->validate([
            'idassetspec' => 'required|string|max:255', 
            'assetcode' => 'nullable|string|max:255',
            'assetcategory' => 'nullable|string|max:255',
            'processorbrand' => 'nullable|string|max:255',
            'processormodel' => 'nullable|string|max:255',
            'processorseries' => 'nullable|string|max:255',
            'memorytype' => 'nullable|string|max:255',
            'memorybrand' => 'nullable|string|max:255',
            'memorymodel' => 'nullable|string|max:255',
            'memoryseries' => 'nullable|string|max:255',
            'memorycapacity' => 'nullable|string|max:255',
            'storagetype' => 'nullable|string|max:255',
            'storagebrand' => 'nullable|string|max:255',
            'storagemodel' => 'nullable|string|max:255',
            'storagecapacity' => 'nullable|string|max:255',
            'graphicstypE1' => 'nullable|string|max:255',
            'graphicsbranD1' => 'nullable|string|max:255',
            'graphicsmodeL1' => 'nullable|string|max:255',
            'graphicsserieS1' => 'nullable|string|max:255',
            'graphicscapacitY1' => 'nullable|string|max:255',
            'graphicstypE2' => 'nullable|string|max:255',
            'graphicsbranD2' => 'nullable|string|max:255',
            'graphicsmodeL2' => 'nullable|string|max:255',
            'graphicsserieS2' => 'nullable|string|max:255',
            'graphicscapacitY2' => 'nullable|string|max:255',
            'screenresolution' => 'nullable|string|max:255',
            'touchscreen' => 'nullable|boolean',
            'backlightkeyboard' => 'nullable|boolean',
            'convertible' => 'nullable|boolean',
            'webcamera' => 'nullable|boolean',
            'speaker' => 'nullable|boolean',
            'microphone' => 'nullable|boolean',
            'wifi' => 'nullable|boolean',
            'bluetooth' => 'nullable|boolean',
        ]);

        // Initialize the HTTP client for making requests
        $client = new \GuzzleHttp\Client();
        
        $touchsreen = filter_var($validated['touchscreen'], FILTER_VALIDATE_BOOLEAN);
        $backlightkeyboard = filter_var($validated['backlightkeyboard'], FILTER_VALIDATE_BOOLEAN);
        $convertible = filter_var($validated['convertible'], FILTER_VALIDATE_BOOLEAN);
        $webcamera = filter_var($validated['webcamera'], FILTER_VALIDATE_BOOLEAN);
        $speaker = filter_var($validated['speaker'], FILTER_VALIDATE_BOOLEAN);
        $microphone = filter_var($validated['microphone'], FILTER_VALIDATE_BOOLEAN);
        $wifi = filter_var($validated['wifi'], FILTER_VALIDATE_BOOLEAN);
        $bluetooth = filter_var($validated['bluetooth'], FILTER_VALIDATE_BOOLEAN);
        
        try {
            // Send POST request directly using the validated data
            $response = $client->put("http://localhost:5252/api/TrnAssetSpec/{$idassetspec}", [
                'json' => [
                    'idassetspec' => $validated['idassetspec'],
                    'assetcode' => $validated['assetcode'],
                    'processorbrand' => $validated['processorbrand'],
                    'processormodel' => $validated['processormodel'],
                    'processorseries' => $validated['processorseries'],
                    'memorytype' => $validated['memorytype'],
                    'memorybrand' => $validated['memorybrand'],
                    'memorymodel' => $validated['memorymodel'],
                    'memoryseries' => $validated['memoryseries'],
                    'memorycapacity' => $validated['memorycapacity'],
                    'storagetype' => $validated['storagetype'],
                    'storagebrand' => $validated['storagebrand'],
                    'storagemodel' => $validated['storagemodel'],
                    'storagecapacity' => $validated['storagecapacity'],
                    'graphicstypE1' => $validated['graphicstypE1'],
                    'graphicsbranD1' => $validated['graphicsbranD1'],
                    'graphicsmodeL1' => $validated['graphicsmodeL1'],
                    'graphicsserieS1' => $validated['graphicsserieS1'],
                    'graphicscapacitY1' => $validated['graphicscapacitY1'],
                    'graphicstypE2' => $validated['graphicstypE2'],
                    'graphicsbranD2' => $validated['graphicsbranD2'],
                    'graphicsmodeL2' => $validated['graphicsmodeL2'],
                    'graphicsserieS2' => $validated['graphicsserieS2'],
                    'graphicscapacitY2' => $validated['graphicscapacitY2'],
                    'screenresolution' => $validated['screenresolution'],
                    'touchscreen' => $touchsreen,
                    'backlightkeyboard' => $backlightkeyboard,
                    'convertible' => $convertible,
                    'webcamera' => $webcamera,
                    'speaker' => $speaker,
                    'microphone' => $microphone,
                    'wifi' => $wifi,
                    'bluetooth' => $bluetooth,
                    'picadded' => 'Kevin',
                    'active' => 'Y',
                ]
            ]);
        
            $data = json_decode($response->getBody()->getContents(),  true);
        
            return redirect()->back()->with("success", "Data has been updated successfully");
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $responseBody = $e->hasResponse() ? (string) $e->getResponse()->getBody() : null;
            Log::error('API Error: ' . $e->getMessage() . ' - Response Body: ' . $responseBody);
        
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the data.']);
        }   
    }
}
