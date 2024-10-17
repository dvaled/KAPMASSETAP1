<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    // Get all software records
    public function index() {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('detailAsset.Laptop', ['softwareData' => $data]); // Keep the view name consistent
    }

    public function create(){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/software');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);

        return view('detailAsset.Laptop', ['softwareData' => $data]); // Keep the view name consistent
    }

    public function store(Request $request){
        $validatedData = $request -> validate([
            'idassetsoftware' => 'required',
            'idasset' => 'required',
            'softwaretype' => 'required',   
            'softwarecategory' => 'required',
            'softwarename' => 'required',
            'softwarelicense' => 'required',
            'active' => 'required',
            'picadded' => 'required',
            'dateadded' => 'required',
            'picupdated' => 'nullable',
            'dateupdated' => 'nullable',
            ]);

        $client = new Client();
        
        try {
        $response = $client->request('POST', 'http://localhost:5252/api/TrnSoftware', [
            'form_params' => $validatedData // Pass the validated data to the API
        ]);
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);
        }catch(Exception $e){
            return redirect()->back()->withErrors("error", "Failed to send data");
        }
    }
}
