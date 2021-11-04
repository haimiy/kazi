<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table = "license";
    protected $fillable = [
        'license_no',
        'license_type',
        'owner_id',
        'health_facility_id',
        'starting_date',
    ];
}
