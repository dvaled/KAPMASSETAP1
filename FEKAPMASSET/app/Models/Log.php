<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'TRN_LOG';


    protected $fillable = [
        "LOGID",
        "ASSETID",
        "ROLEID",
        "ACTIONPERFORMED",
        "USERADDED",
        "DATEADDED"
    ];
    
    public function User(){
        return $this->belongsTo(User::class, 'USERADDED', 'NIPP');
    }
    
}
