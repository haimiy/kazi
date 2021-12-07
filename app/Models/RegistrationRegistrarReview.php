<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationRegistrarReview extends Model
{
    use HasFactory;
    protected $table  = "registration_registrar_review";
    protected $fillable = [
        'registration_id',
        'review_status',
//        'starting_date_of_operation',
//        'ending_date_of_operation',
        'registrar_id',
        'review_type',
    ];
}
