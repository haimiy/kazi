<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffing extends Model
{
    use HasFactory;
    protected $table = "staffing";
    protected $fillable = [
        'staff_occupation_id',
        'no_of_full_time',
        'no_of_part_time',
        'health_facility_id',
    ];
}
