<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    // Specify the primary key
    protected $primaryKey = 'MasterID';

    protected $fillable = [
        "MasterID",
        "Condition",
        "NoSr",
        "Description",
        "ValueGcm",
        "TypeGcm",
        "Active"
    ];
}

