<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'images',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'images' => 'array',
    ];

    protected $appends = ['images_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getImagesPathAttribute()
    {
        $images = [];

        if ($this->images) {
            foreach ($this->images as $image) {
                array_push($images, asset('storage/' . $image));
            }
        } else {
            array_push($images, asset('images/no-image.png'));
        }

        return $images;
    }
}
