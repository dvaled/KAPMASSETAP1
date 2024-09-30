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

    public function Hardware(){
        return $this->belongsTo(Hardware::class, 'IdAsset', 'IdAsset');
    }
    public function ardware(){
        return $this->hasMany(Hardware::class, 'IdAsset', 'IdAsset');
    }



   
   
}
