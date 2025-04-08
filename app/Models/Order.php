<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address_id',
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        'price',
        'amount',
        'billing_address_id',
        'delivery_charge',
        'payment_terms'

    ];


    public function user()
    {
        return $this->belongsTo(CompanyRegistration::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relationship with Size
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    // Relationship with Color
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    // Relationship with Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
