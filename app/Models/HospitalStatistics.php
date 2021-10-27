<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalStatistics extends Model
{
    use HasFactory;
    protected $table = "hospital_statistic";
    protected $fillable = [
        'starting_year',
        'health_facility',
        'hospital_no',
    ];
}
