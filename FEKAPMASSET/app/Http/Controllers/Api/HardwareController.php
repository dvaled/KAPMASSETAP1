<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hardware;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HardwareController extends Controller
{
    // Get all hardware
    public function index()
    {
        $client = new Client();
    try {
        $response = $client->request('GET', 'http://localhost:5252/api/TrnAssetSpec/{IDASSET}');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        if (!is_array($data)) {
            $data = []; 
        }

        return view('hardware.index', ['hardwareData' => $data]);

    } catch (\Exception $e) {
        return view('hardware.index', ['hardwareData' => []])-> with($e);
    }
        // $hardware = Hardware::all();
        // return response()->json($hardware, 200);
    }

    public function store(){
        $response = Http::get('http://localhost:5252/api/TrnAssetSpec/{IDASSET}'); 

        if ($response->successful()) {
            
            $hardwareData = $response->json(); 

            return view('hardware.store', compact('hardwareData'));
        } else {
            return redirect()->back()->with('error', 'Failed to retrieve data from the API.');
        }
    }
}
