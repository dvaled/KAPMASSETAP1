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
        $response = $client->requeest('get', 'http://localhost:5252/api/Log');
        $body = $response -> getBody();
        $content = $body -> getContents();
        $data = json_decode($content, true);

        return view('dashboard', ['logData' => $data]);
    }

    public function store(){
        $client = new Client();
        $response = $client->request('POST', 'http://localhost:5252/api/Log');
 
    }
}
