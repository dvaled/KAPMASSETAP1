<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $primaryKey = "TRN_DTL_SOFTWARE";

    protected $fillable = [
        "IDSOFTWARE",
        "IDASSET",
        "SOFTWARETYPE",
        "SOFTWARECATEGORY",
        "SOFTWARENAME",
        "SOFTWARELICENSE",
        "INSTALLED_DATE",
        "PICADDED",
        "PICUPDATED",
        "ACTIVE"
    ];

    public function Hardware(){
        return $this->belongsTo(Hardware::class, 'IDASSET', 'IDASSET');
    }



   
}
