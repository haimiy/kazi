<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = "location";
    protected $fillable = [
        'street',
        'address',
        'village',
        'ward',
        'po_box',
        'district_id',
        'region',
        'latitude',
        'longitude',
    ];
}
