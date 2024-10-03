<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $table = 'TRN_DTL_SPEC';

    protected $fillable = [
        "ASSETID",
        "PROCESSORBRAND",
        "PROCESSORMODEL",
        "PROCESSORSERIES",
        "MEMORYTYPE",
        "MEMORYBRAND",
        "MEMORYMODEL",
        "MEMORYSERIES",
        "MEMORYCAPACITY",
        "STORAGETYPE",
        "STORAGEBRAND",
        "STORAGEMODEL",
        "STORAGESERIES",
        "STORAGECAPACITY",
        "GRAPHICSTYPE",
        "GRAPHICSBRAND",
        "GRAPHICSMODEL",
        "GRAPHICSERIES",
        "GRAPHICSCAPACITY",
        "SCREENRESOLUTION",
        "TOUCHSCREEN",
        "BACKLIGHTKEYBOARD",
        "CONVERTIBLE",
        "WEBCAMERA",
        "SPEAKER",
        "MICROPHONE",
        "WIFI",
        "BLUETOOTH",
        "USER_ADDED",
        "USER_UPDATED"
    ];

    // public function Asset(){
    //     return $this->belongsTo(Asset::class, 'IDASSET', 'IDASSET');
    // }
    
}
