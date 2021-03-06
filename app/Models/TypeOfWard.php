<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfWard extends Model
{
    use HasFactory;
    protected $table = "type_of_ward";
    protected $fillable = [
        'name',
        'description',
        'is_specified'
    ];
}
