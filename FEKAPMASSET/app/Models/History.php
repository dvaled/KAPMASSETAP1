<?php

namespace App\Models;

use Carbon\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        "IdAssetHistory",
        "IdAsset",
        "NIPP",
        "Name",
        "Position",
        "Unit",
        "Department",
        "Directorate",
        "PICAdded",
        "DateAdded",
        "DateUpdated"
    ];

    //foreign key relationship
    public function Employee(){
        return $this->belongsTo(Employee::class, 'NIPP', 'NIPP');
    }

    public function User(){
        return $this->belongsTo(User::class, 'PICAdded', 'id');
    }


}
