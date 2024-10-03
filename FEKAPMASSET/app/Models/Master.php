<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Type",
 *     title="Type Model",
 *     type="object",
 *     required={"MasterID", "Condition", "NoSr", "Description", "ValueGcm", "TypeGcm", "Active"},
 *     @OA\Property(property="MasterID", type="integer", description="Primary key"),
 *     @OA\Property(property="Condition", type="string"),
 *     @OA\Property(property="NoSr", type="string"),
 *     @OA\Property(property="Description", type="string"),
 *     @OA\Property(property="ValueGcm", type="integer"),
 *     @OA\Property(property="TypeGcm", type="string"),
 *     @OA\Property(property="Active", type="boolean")
 * )
 */
class Master extends Model
{
    use HasFactory;
    // Specify the primary key
    protected $primaryKey = 'MasterID';

    protected $fillable = [
        "MASTERID",
        "CONDITION",
        "NOSR",
        "DESCRIPTION",
        "VALUEGCM",
        "TYPEGCM",
        "ACTIVE"
    ];
}

