<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //retrieve image from the api
    public function index(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Log');
    }
}
