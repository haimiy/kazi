<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryHealthFacility extends Model
{
    use HasFactory;
    protected $table = "history_health_facility";
    protected $fillable = [
        'facility_name',
        'reg_no',
        'district_name',
        'type_of_health_unit',
        'starting_operation_date',
        'full_name',
        'phone_no',
        'location',
        'service_name',
        'doctor_incharge_name',
        'qualification',
    ];
}
