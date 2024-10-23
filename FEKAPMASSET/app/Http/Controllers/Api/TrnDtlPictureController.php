<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TrnDtlPictureController extends Controller
{
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/TrnDtlPicture');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('master.index', ['trnpictureData' => $data]); // Keep the view name consistent
    }
}