<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        "LogID",
        "AssetID",
        "RoleID",
        "ActionPerformed",
        "UserAdded",
        "DateAdded"
    ];
    
    
}
