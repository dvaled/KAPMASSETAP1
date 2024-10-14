<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        $response = $client->request('GET', 'http://localhost:5252/api/TrnAsset/all');
        $body = $response->getBody()->getContents();
        $logData = json_decode($body, true);
        return view('dashboard', [
            'masterData' => $masterData,
            'logData' => $logData
        
        ]);


    }

    // public function store(){
    //     $client = new Client();
    //     $response = $client->request('POST', 'http://localhost:5252/api/Log');
 
    // }
}
