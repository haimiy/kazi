<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremisesType extends Model
{
    use HasFactory;
    protected $table = "premises_type";
    protected $fillable = [
        'name',
        'description',
    ];
}
