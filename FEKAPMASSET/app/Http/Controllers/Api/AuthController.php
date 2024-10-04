<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function index(){
        $client = new Client();
    try {
        $response = $client->request('GET', 'http://localhost:5252/api/Auth/Login');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        if (!is_array($data)) {
            $data = []; 
        }

        return view('auth.login', ['masters' => $data]);

    } catch (\Exception $e) {
        return view('master.index', ['masters' => []])-> with($e);
    }
    }
}
