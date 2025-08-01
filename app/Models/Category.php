<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/categories/' . $value);
        }

        return asset('uploads/categories/default_image.jpg');
    }

}
