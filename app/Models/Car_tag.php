<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'tag_id',
    ];
}
