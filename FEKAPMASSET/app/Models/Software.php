<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $fillable = [
        "IdSoftware",
        "IdAsset",
        "SoftwareType",
        "SoftwareCategory",
        "SoftwareName",
        "SoftrwareLicense"
    ];
}
