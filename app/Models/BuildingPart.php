<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingPart extends Model
{
    use HasFactory;

    public function state(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BuildingPartsState::class);
    }
}
