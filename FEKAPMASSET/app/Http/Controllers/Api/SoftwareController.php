<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Software;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    // Get all software records
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TRN_');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('master.index', ['masterData' => $data]); // Keep the view name consistent
    }


    
}
