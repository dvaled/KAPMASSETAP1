<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        "MAINTENANCEID",
        "IDASSET",
        "USERADDED",
        "NOTES",
        "DATEADDED"
    ];

    public function MasterID(){
        return $this->belongsTo(Master::class, "IDASSET", "MASTERID");
    }

    public function User(){
        return $this->belongsTo(User::class, "USERADDED", "NIPP");
    } 

    
}
