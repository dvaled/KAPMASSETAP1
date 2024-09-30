<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $fillable = [
        "IdAsset",
        "NIPP",
        "ProcessorBrand",
        "ProcessorModel",
        "ProcessorSeries",
        "MemoryType",
        "MemoryBrand",
        "MemoryModel",
        "MemorySeries",
        "MemoryCapacity",
        "StorageType",
        "StorageBrand",
        "StorageModel",
        "StorageSeries",
        "StorageCapacity",
        "GraphicsType",
        "GraphicsBrand",
        "GraphicsModel",
        "GraphicsSeries",
        "GraphicsCapacity",
        "ScreenResolution",
        "Touchscreen",
        "BacklightKeyboard",
        "Convertible",
        "WebCamera",
        "Speaker",
        "Microphone",
        "Wifi",
        "Bluetooth"

    ];
}
