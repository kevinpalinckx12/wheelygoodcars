<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    

    use HasFactory;

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'price',
        'mileage',
        'seats',
        'doors',
        'production_year',
        'weight',
        'color',
        'sold_at',
        'views',
    ];

    
    


}
