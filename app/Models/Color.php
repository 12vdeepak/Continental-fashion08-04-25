<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_color', 'color_id', 'product_id');
    }

    // Color.php
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'color_id');
    }
}
