<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'dni',
        'phone',
        'email',
        'brand',
        'model',
        'year',
        'capacity',
        'price',
        'pickup_date',
        'return_date',
        'pickup_location',
        'return_location',
        'status'
    ];

    //para no mostrar estos campos
   /* protected $hidden = [
        'created_at', 
        'updated_at'
    ];    */
}
