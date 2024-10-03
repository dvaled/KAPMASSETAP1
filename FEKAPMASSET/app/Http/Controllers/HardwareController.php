<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    public function index(){
        $Hardware = Hardware::all();
        return view('Hardware.index', compact('Hardware'));
    }

      // Show a single type
    public function show(Hardware $Hardware){
        return view('Hardware.show', compact('Hardware'));
    }

    public function create(){
        return view('Hardware.create');
    }

    public function store (Request $request){
        $request -> validate([
            "ASSETID" => 'required',
            "PROCESSORBRAND"=> 'required',
            "PROCESSORMODEL"=> 'required',
            "PROCESSORSERIES"=> 'required',
            "MEMORYTYPE"=> 'required',
            "MEMORYBRAND"=> 'required',
            "MEMORYMODEL"=> 'required',
            "MEMORYSERIES"=> 'required',
            "MEMORYCAPACITY"=> 'required',
            "STORAGETYPE"=> 'required',
            "STORAGEBRAND"=> 'required',
            "STORAGEMODEL"=> 'required',
            "STORAGESERIES"=> 'required',
            "STORAGECAPACITY"=> 'required',
            "GRAPHICSTYPE"=> 'required',
            "GRAPHICSBRAND"=> 'required',
            "GRAPHICSMODEL"=> 'required',
            "GRAPHICSSERIES"=> 'required',
            "GRAPHICSCAPACITY"=> 'required',
            "SCREENRESOLUTION"=> 'required',
            "TOUCHSCREEN"=> 'required',
            "BACKLIGHTKEYBOARD"=> 'required',
            "CONVERTIBLE"=> 'required',
            "WEBCAMERA"=> 'required',
            "SPEAKER"=> 'required',
            "MICROPHONE"=> 'required',
            "WIFI"=> 'required',
            "BLUETOOTH"=> 'required'
        ]);
        Hardware::create($request->all());
        return redirect()->route('Hardware.index')->with('success', 'Hardware created successfully');
    }

    public function update(Request $request){
        $request -> validate([
            "IdAsset" => 'required',
            "NIPP"=> 'required' ,
            "PROCESSORBRAND"=> 'required',
            "PROCESSORMODEL"=> 'required',
            "PROCESSORSERIES"=> 'required',
            "MEMORYTYPE"=> 'required',
            "MEMORYBRAND"=> 'required',
            "MEMORYMODEL"=> 'required',
            "MEMORYSERIES"=> 'required',
            "MEMORYCAPACITY"=> 'required',
            "STORAGETYPE"=> 'required',
            "STORAGEBRAND"=> 'required',
            "STORAGEMODEL"=> 'required',
            "STORAGESERIES"=> 'required',
            "STORAGECAPACITY"=> 'required',
            "GRAPHICSTYPE"=> 'required',
            "GRAPHICSBRAND"=> 'required',
            "GRAPHICSMODEL"=> 'required',
            "GRAPHICSSERIES"=> 'required',
            "GRAPHICSCAPACITY"=> 'required',
            "SCREENRESOLUTION"=> 'required',
            "TOUCHSCREEN"=> 'required',
            "BACKLIGHTKEYBOARD"=> 'required',
            "CONVERTIBLE"=> 'required',
            "WEBCAMERA"=> 'required',
            "SPEAKER"=> 'required',
            "MICROPHONE"=> 'required',
            "WIFI"=> 'required',
            "BLUETOOTH"=> 'required'
        ]);
        $Hardware = Hardware::find($request -> id);
        $Hardware->update($request->all());
        return redirect()->route('Hardware.index')->with('success', 'Hardware updated successfully');
    }

    public function delete(Hardware $Hardware){
        $Hardware->delete();
        return redirect()->route('Hardware.index')->with('success', 'Hardware deleted successfully');
    }
}
