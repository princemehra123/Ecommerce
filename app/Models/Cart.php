<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_name',
        'email',
        'phone',
        'quantity',
        'product_name',
        'product_bio',
        'price',
        'image',
        'user_id',
        'product_id',
        'address'
    ];
}
