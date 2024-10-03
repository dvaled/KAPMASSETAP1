<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primarykey = "MST_EMPLOYEE";

    protected $fillable = [
        "NIPP",
        "NAME",
        "POSITION",
        "UNIT",
        "DEPARTMENT",
        "DIRECTORATE",
        "ACTIVE"
    ];

}
