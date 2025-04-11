<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ với hình ảnh
    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function avatar(){
        return $this->hasOne(ProductImage::class)->where('sort_order', 0);
    }
}
