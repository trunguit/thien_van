<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = [];
    protected $table = 'product_images';
    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
