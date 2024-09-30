<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "NIPP",
        "Name",
        "Postiion",
        "Unit",
        "Department",
        "Directorate",
        "Password",
        "Active"
    ];

}
