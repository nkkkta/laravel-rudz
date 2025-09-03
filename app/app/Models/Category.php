<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'image_url',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

        /**
     * A utility method to check if the category has a parent.
     *
     * @return bool
     */
    public function hasParent(): bool
    {
        return !is_null($this->parent_id);
    }

    /**
     * A utility method to check if the category has children.
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->children()->exists();
    }
}