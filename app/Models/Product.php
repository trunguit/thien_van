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
    public function avatar2nd(){
        return $this->hasOne(ProductImage::class)->where('sort_order', 1);
    }
    public function colorAttributes()
    {
        return $this->hasMany(ProductAttribute::class)->where('type', 'color');
    }

    public function sizeAttributes()
    {
        return $this->hasMany(ProductAttribute::class)->where('type', 'size');
    }

    // Helper methods
    public function getColorsAttribute()
    {
        return $this->colorAttributes->pluck('value')->toArray();
    }

    public function getSizesAttribute()
    {
        return $this->sizeAttributes->pluck('value')->toArray();
    }
}
