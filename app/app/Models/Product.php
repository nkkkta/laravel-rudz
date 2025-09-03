<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // protected $attributes = [

    //     'options' => '[]',

    //     'delayed' => false,

    // ];

    protected $fillable = [
        'name',
        'is_available',
        'price',
        'image_url'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


}
