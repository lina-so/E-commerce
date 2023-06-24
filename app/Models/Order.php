<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'shipping_price','total_price','address',
    'phone','email','name','city','country','postal_code'];
    protected $table = 'orders';
}
