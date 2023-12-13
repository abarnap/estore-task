<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $appends = ['image_path'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return asset('images/no-image.png');
    }
}
