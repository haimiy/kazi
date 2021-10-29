<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthFacility extends Model
{
    use HasFactory;
    protected $table = "health_facility";
    protected $fillable = [
        'facility_name',
        'reg_no',
        'location_id',
    ];
}
