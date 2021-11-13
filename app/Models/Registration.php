<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table  = "registration";
    protected $fillable = [
        'type_of_health_unit_id',
        'type_of_health_unit_specified',
        'authority_responsible_id',
        'authority_responsible_specified',
        'starting_operation_date',
        'nearest_hospital_name',
        'nearest_hospitall_owner',
        'nearest_hospitall_distance',
        'nearest_hospitall_type_of_health_unit_id',
        'health_facility_id',
        'status',
        'application_ref_no',
    ];
}
