<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // protected $attributes = [

    //     'options' => '[]',

    //     'delayed' => false,

    // ];

    protected $fillable = [
        'name',
        'is_available',
        'price',
        'rating',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
    ];


}
