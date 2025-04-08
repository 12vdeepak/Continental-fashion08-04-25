<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', 'vat_percentage'];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
