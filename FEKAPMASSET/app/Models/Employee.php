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

     //Insert foreign key relationship e.g

    // public function Employee(){
    //     return $this->belongsTo(Employee::class, 'NIPP', 'NIPP');
    // }

    // belongsTo(Employee::class, 'NIPP', 'NIPP'): This defines a many-to-one relationship with the Employee model, 
    // meaning that each History record is associated with one Employee.
    // The first 'NIPP' is the foreign key in the History table.
    // The second 'NIPP' is the primary key in the Employee table.
    // This allows you to retrieve the employee associated with the History record using $history->employee.
}
