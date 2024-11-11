<?php
namespace App\Http\Controllers\API;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TrnDtlPictureController extends Controller
{
    public function index($assetcode) {
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

        // Pass both assetData and assetSpecData to the view
        return view('image.create', [
            'assetcode' => $assetcode,
            'assetData' => $assetData,
            'userData' => $userData,
        ]);
    }

    public function indexUpdate($assetcode) {
        // Create a new HTTP client instance
        $client = new Client();

        // First API call to fetch asset data (TrnAsset)
        $responseAsset = $client->request('GET', "http://localhost:5252/api/TrnAsset/{$assetcode}");
        $contentAsset = $responseAsset->getBody()->getContents();
        $assetData = json_decode($contentAsset, true);

        // Fetch PIC
        $responseUser = $client -> get('http://localhost:5252/api/User');
        $contentUser = $responseUser->getBody()->getContents();
        $userData = json_decode($contentUser, true);

        // Pass both assetData and assetSpecData to the view
        return view('image.update', [
            'assetcode' => $assetcode,
            'assetData' => $assetData,
            'userData' => $userData,
        ]);
    }

    public function store(Request $request){
        Log::info('Request Data:', $request->all());
        // Validate the input
        $validated = $request->validate([
            'assetcode' => 'required',
            'assetimage' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Ensure it's a valid image file
            'active' => 'required',
            'picadded' => 'required',
        ]);

        $client = new Client();

        $assetcode = $validated['assetcode'];

        try {
             // Store the image locally and get the storage path
             if ($request->hasFile('assetimage')) {
                // No need to store the file locally, just get the file and send it in the POST request
                $file = $request->file('assetimage');
            }   

            // Build the multipart form data including the image file
            $response = $client->post('http://localhost:5252/api/TrnAssetDtlPicture', [
                'multipart' => [
                    [
                        'name' => 'ASSETCODE',
                        'contents' => $validated['assetcode'],
                    ],
                    [
                        'name' => 'ACTIVE',
                        'contents' => $validated['active'],
                    ],
                    [
                        'name' => 'PICADDED',
                        'contents' => $validated['picadded'],
                    ],
                    [
                        'name' => 'ASSETIMG',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $request->file('assetimage')->getClientOriginalName(),
                    ],
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true); // Decode the response
            // Log success (ensure $data is an array or provide a message)
            Log::info("Success", $data ? $data : []); // Pass empty array if $data is null  
            return redirect("/detailAsset/Laptop/$assetcode")
                ->with("success", "Data has been added successfully");
        } catch (\Throwable $th) {
            // Log error and handle the exception
            Log::error('API Error: ' . $th->getMessage());
            return back()->withErrors('Failed to upload data.');
        }
    }

    //funtion to delete (switch of the active filed)
    public function deleteAsset(Request $request, $id){
       // Validate the input
       $validated = $request->validate([
        'assetimage' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Ensure it's a valid image file
        'active' => 'required',
    ]);

        $client = new Client();
    }

    public function update(Request $request, $assetcode){
        Log::info('Request Data:', $request->all());

        // Validate the input
        $validated = $request->validate([
            'idassetpic' => 'required',
            'assetcode' => 'required',
            'assetpic' => 'nullable|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048', 
            'active' => 'required',
            'picadded' => 'required',
        ]);

        $client = new Client();

        try {
            // Prepare the multipart form data
            $multipartData = [
                [
                    'name' => 'ASSETCODE',
                    'contents' => $validated['assetcode'],
                ],
                [
                    'name' => 'ACTIVE',
                    'contents' => $validated['active'],
                ],
                [
                    'name' => 'PICADDED',
                    'contents' => $validated['picadded'],
                ],
            ];

            // If a new file is uploaded, add it to the multipart data
            if ($request->hasFile('ASSETPIC')) {
                $file = $request->file('ASSETPIC');
                $multipartData[] = [
                    'name' => 'ASSETPIC',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ];
            } else {
                $existingImageUrl = $validated['ASSETPIC']; // Use the existing image URL from the request
                $multipartData[] = [
                    'name' => 'ASSETIMG', // Assuming this is the field the API expects
                    'contents' => $existingImageUrl,
                ];
            }

            // Make the PUT request
            $response = $client->put("http://localhost:5252/api/TrnAssetDtlPicture/{$validated['idassetpic']}", [
                'multipart' => $multipartData,
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("Success", $data ? $data : []);

            // Redirect to the detail page
            return redirect("/detailAsset/Laptop/$assetcode")
                ->with("success", "Data has been added successfully");
        } catch (RequestException $e) {
            Log::error('API Error: ' . $e->getMessage());
            if ($e->hasResponse()) {
                Log::error('API Response: ' . $e->getResponse()->getBody());
            }
            return back()->withErrors(['message' => 'Failed to update picture.']);
        } catch (\Throwable $th) {
            Log::error('API Error: ' . $th->getMessage());
            return back()->withErrors(['message' => 'An unexpected error occurred.']);
        }
    }
}