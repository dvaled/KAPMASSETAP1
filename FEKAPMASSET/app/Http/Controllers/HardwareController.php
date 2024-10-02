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
            "IdAsset" => 'required',
            "NIPP"=> 'required' ,
            "ProcessorBrand"=> 'required',
            "ProcessorModel"=> 'required',
            "ProcessorSeries"=> 'required',
            "MemoryType"=> 'required',
            "MemoryBrand"=> 'required',
            "MemoryModel"=> 'required',
            "MemorySeries"=> 'required',
            "MemoryCapacity"=> 'required',
            "StorageType"=> 'required',
            "StorageBrand"=> 'required',
            "StorageModel"=> 'required',
            "StorageSeries"=> 'required',
            "StorageCapacity"=> 'required',
            "GraphicsType"=> 'required',
            "GraphicsBrand"=> 'required',
            "GraphicsModel"=> 'required',
            "GraphicsSeries"=> 'required',
            "GraphicsCapacity"=> 'required',
            "ScreenResolution"=> 'required',
            "Touchscreen"=> 'required',
            "BacklightKeyboard"=> 'required',
            "Convertible"=> 'required',
            "WebCamera"=> 'required',
            "Speaker"=> 'required',
            "Microphone"=> 'required',
            "Wifi"=> 'required',
            "Bluetooth"=> 'required'
        ]);
        Hardware::create($request->all());
        return redirect()->route('Hardware.index')->with('success', 'Hardware created successfully');
    }

    public function update(Request $request){
        $request -> validate([
            "IdAsset" => 'required',
            "NIPP"=> 'required' ,
            "ProcessorBrand"=> 'required',
            "ProcessorModel"=> 'required',
            "ProcessorSeries"=> 'required',
            "MemoryType"=> 'required',
            "MemoryBrand"=> 'required',
            "MemoryModel"=> 'required',
            "MemorySeries"=> 'required',
            "MemoryCapacity"=> 'required',
            "StorageType"=> 'required',
            "StorageBrand"=> 'required',
            "StorageModel"=> 'required',
            "StorageSeries"=> 'required',
            "StorageCapacity"=> 'required',
            "GraphicsType"=> 'required',
            "GraphicsBrand"=> 'required',
            "GraphicsModel"=> 'required',
            "GraphicsSeries"=> 'required',
            "GraphicsCapacity"=> 'required',
            "ScreenResolution"=> 'required',
            "Touchscreen"=> 'required',
            "BacklightKeyboard"=> 'required',
            "Convertible"=> 'required',
            "WebCamera"=> 'required',
            "Speaker"=> 'required',
            "Microphone"=> 'required',
            "Wifi"=> 'required',
            "Bluetooth"=> 'required'
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
