<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'product_name',
        'product_details',
        'qty_per_carton',
        'material_id',
        'weight_id',
        'article_id',
        'fabric_id',
        'pack_poly',
        'country_id',
        'manufacturer_name',
        'add_stoke',
        'category_1_price',
        'category_2_price',
        'category_3_price',
        'category_4_price',
        'sale',
        'sale_percentage',
        'promotion_id',
        'wear_id',
        'remarks'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }


    public function weight(): BelongsTo
    {
        return $this->belongsTo(Weight::class, 'weight_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }


    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotional::class);
    }

    public function wear(): BelongsTo
    {
        return $this->belongsTo(Wear::class);
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    public function imageColors()
    {
        return $this->hasManyThrough(Color::class, ProductImage::class, 'product_id', 'id', 'id', 'color_id');
    }


    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'product_brand');
    }



    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class, 'fabric_id', 'id');
    }

    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }




    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function subCategory()
    // {
    //     return $this->belongsTo(SubCategory::class);
    // }

    // public function material()
    // {
    //     return $this->belongsTo(Material::class);
    // }

    // public function fabricWeight()
    // {
    //     return $this->belongsTo(Weight::class);
    // }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}