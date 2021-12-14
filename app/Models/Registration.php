<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table  = "registration";
    protected $fillable = [
        'authority_responsible_id',
        'authority_responsible_specified',
        'starting_operation_date',
        'nearest_hospital_name',
        'nearest_hospital_owner',
        'nearest_hospital_distance',
        'nearest_hospital_type_of_health_unit',
        'health_facility_id',
        'status',
        'application_ref_no',
    ];
}
