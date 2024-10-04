<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MasterController extends Controller
{
    //fetch all data

    public function getMaster()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:5252/api/Master');
        $body = $response->getBody();
        $content = $body->getContents();
        $data = json_decode($content, true);
        return view('master.index', ['masterData' => $data]);
    }


    public function show($id)
    {
        $master = Master::find($id);

        if (!$master) {
            return response()->json(['message' => 'master not found'], 404);
        }

        return response()->json($master, 200);
    }

    //store new master
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "MASTERID" => 'required',
            "CONDITION"=> 'required',
            "NOSR" => 'required',
            "DESCRIPTION" => 'required',
            "VALUEGCM" => 'required',
            "TYPEGCM" => 'required',
            "ACTIVE" => 'required'
        ]);

        $master = Master::create($validatedData);
        return response()->json(['message' => 'master created successfully', 'data' => $master], 201);
    }

    public function update(Request $request, $id)
    {
        $master = Master::find($id);

        if (!$master) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $validatedData = $request->validate([
            "MASTERID" => 'required',
            "CONDITION"=> 'required',
            "NOSR" => 'required',
            "DESCRIPTION" => 'required',
            "VALUEGCM" => 'required',
            "TYPEGCM" => 'required',
            "ACTIVE" => 'required'
        ]);

        $master->update($validatedData);
        return response()->json(['message' => 'Type updated successfully', 'data' => $master, 200]);
    }

    // Delete a type
    public function destroy($id)
    {
        $master = Master::find($id);
         
        if (!$master) {
            return response()->json(['message' => 'master not found'], 404);
        }

        $master->delete();
        return response()->json(['message' => 'master deleted successfully'], 200);
    }
}


