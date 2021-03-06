<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoOfBedsByWard extends Model
{
    use HasFactory;
    protected $table = "no_of_beds_by_ward";
    protected $fillable = [
        'type_of_ward',
        'no_of_beds',
        'is_specified',
        'specified_ward_type',
        'health_facility_id',
    ];
}
