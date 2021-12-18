<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseHistory extends Model
{
    use HasFactory;
    protected $table = "license_histories";
    protected $fillable = [
        'license_no',
        'owner_id',
        'date_of_issue',
        'expiry_date',
    ];
}
