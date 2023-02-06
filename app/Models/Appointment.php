<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointments";
    protected $fillable = [
        'city',
        'street',
        'bulding',
        'day',
        'from',
        'to',
        'sitters_id',
        'users_id',
        'children_id',

    ];

}
