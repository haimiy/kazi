<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorityResponsible extends Model
{
    use HasFactory;
    protected $table = "authority_responsible";
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
