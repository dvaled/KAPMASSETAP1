<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
}
