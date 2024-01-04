<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'street_address',
        'postcode',
        'city',
        'phone_number',
        'email_address',
    ];
}
