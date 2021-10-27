<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorIncharge extends Model
{
    use HasFactory;
    protected $table = "doctor_incharge";
    protected $fillable = [
        'qualification',
        'user_id',
    ];
}
