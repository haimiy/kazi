<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    protected $table = "occupation";
    protected $fillable = [
        'name',
        'description',
        'is_occupation_specified',
        'specified_staff_occupation',   
    ];
}
