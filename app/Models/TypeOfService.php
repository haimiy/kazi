<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfService extends Model
{
    use HasFactory;
    protected $table = "type_of_services";
    protected $fillable = [
        'name_of_services',
        'description',
        'have_additional_requirement',
        'additional_requirement',
        'no_of_beds',
        
    ];
}
