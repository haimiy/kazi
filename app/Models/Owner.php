<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = "owner";
    protected $fillable = [
        'person_incharge',
        'signature',
        'designation',
        'ownership_type',
    ];

    public function organisation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Organisation::class);
    }

}
