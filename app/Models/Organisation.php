<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $table = "organisation";
    protected $fillable = [
        'org_name',
        'type',
        'company_email',
        'company_phone_no',
        'company_address',
        'owner_id',
    ];
}
