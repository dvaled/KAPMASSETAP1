<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hardware;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    // Get all hardware
    public function index()
    {
        $hardware = Hardware::all();
        return response()->json($hardware, 200);
    }

    // Get a specific hardware by ID
    public function show($id)
    {
        $hardware = Hardware::find($id);

        if (!$hardware) {
            return response()->json(['message' => 'Hardware not found'], 404);
        }

        return response()->json($hardware, 200);
    }

    // Store a new hardware
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IdAsset' => 'required',
            'NIPP' => 'required',
            'ProcessorBrand' => 'required',
            'ProcessorModel' => 'required',
            'ProcessorSeries' => 'required',
            'MemoryType' => 'required',
            'MemoryBrand' => 'required',
            'MemoryModel' => 'required',
            'MemorySeries' => 'required',
            'MemoryCapacity' => 'required|integer',
            'StorageType' => 'required',
            'StorageBrand' => 'required',
            'StorageModel' => 'required',
            'StorageSeries' => 'required',
            'StorageCapacity' => 'required|integer',
            'GraphicsType' => 'required',
            'GraphicsBrand' => 'required',
            'GraphicsModel' => 'required',
            'GraphicsSeries' => 'required',
            'GraphicsCapacity' => 'required|integer',
            'ScreenResolution' => 'required',
            'Touchscreen' => 'required|boolean',
            'BacklightKeyboard' => 'required|boolean',
            'Convertible' => 'required|boolean',
            'WebCamera' => 'required|boolean',
            'Speaker' => 'required|boolean',
            'Microphone' => 'required|boolean',
            'Wifi' => 'required|boolean',
            'Bluetooth' => 'required|boolean',
        ]);

        $hardware = Hardware::create($validatedData);
        return response()->json(['message' => 'Hardware created successfully', 'data' => $hardware], 201);
    }

    // Update an existing hardware
    public function update(Request $request, $id)
    {
        $hardware = Hardware::find($id);

        if (!$hardware) {
            return response()->json(['message' => 'Hardware not found'], 404);
        }

        $validatedData = $request->validate([
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

        $hardware->update($validatedData);
        return response()->json(['message' => 'Hardware updated successfully', 'data' => $hardware], 200);
    }

    // Delete a hardware
    public function destroy($id)
    {
        $hardware = Hardware::find($id);

        if (!$hardware) {
            return response()->json(['message' => 'Hardware not found'], 404);
        }

        $hardware->delete();
        return response()->json(['message' => 'Hardware deleted successfully'], 200);
    }
}
