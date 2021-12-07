<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnershipHealthFacility extends Model
{
    use HasFactory;
    protected $table = "owner_health_facility";
    protected $fillable = [
        'owner_id',
        'health_facility_id',
    ];
}
