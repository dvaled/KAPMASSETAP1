<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        "MaintenanceID",
        "AssetID",
        "User_Added",
        "Notes",
        "Date_Added"
    ];

    public function MasterID(){
        return $this->belongsTo(Type::class, "AssetID", "MasterID");
    }

    public function User(){
        return $this->belongsTo(User::class, "User_Added", "NIPP");
    } 

    
}
