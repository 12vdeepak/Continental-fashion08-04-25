<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyRegistration extends Model
{

    use SoftDeletes; // Enables soft delete functionality

    protected $dates = ['deleted_at']; // Defines deleted_at as a date field
    use HasFactory;

    protected $fillable = [
        'company_name',
        'street',
        'zip_code',
        'city',
        'country',
        'phone_number',
        'gender',
        'first_name',
        'last_name',
        'supervisory',
        'email',
        'password',
        'vat_id_number',
        'business_registration_file',
        'note',
        'terms_accepted',

    ];


    public function addresses()
    {
        return $this->hasMany(Address::class); // Assuming the Address model exists
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'user_id'); // Specify the foreign key
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id'); // Adjust if needed
    }
}
