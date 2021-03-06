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
        'user_id',
        'doctor_incharge_id',
        'location_id',
        'type_of_health_unit_id',
        'type_of_health_unit_specified',
        'remark',
        'status'
    ];

    public function user(){
        return $this->belongsTo(HealthFacility::class, 'user_id');
    }
}
