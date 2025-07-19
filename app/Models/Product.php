<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $casts = [
        'images' => 'array',
    ];

    public function getImageAttribute($value)
    {
        $images = json_decode($value, true);

        if (!is_array($images) || empty($images)) {
            return [asset('images/products/default_image.jpg')];
        }

        return array_map(fn($img) => asset('images/products/' . $img), $images);
    }
}
