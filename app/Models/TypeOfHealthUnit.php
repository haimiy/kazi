<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfHealthUnit extends Model
{
    use HasFactory;
    protected $table = "type_of_health_unit";
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
