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
        'image' => 'array',
    ];

    public function getImageAttribute($value)
    {
        if (empty($value)) {
            return [asset('uploads/products/2.jpg')];
        }

        $images = is_array($value) ? $value : json_decode($value, true);
        if (! is_array($images)) {
            $images = explode(',', $value);
        }

        return array_map(fn($img) => asset('uploads/products/' . trim($img)), $images);
    }

}
