<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityOfWaterSupply extends Model
{
    use HasFactory;
    protected $table = 'health_facility_water_supply';
    protected $fillable = [
        'type_of_water_supply_id',
        'health_facility_id',
    ];
}
