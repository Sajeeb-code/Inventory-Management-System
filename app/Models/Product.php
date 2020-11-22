<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_name',
        'product_code',
        'cat_id',
        'supp_id',
        'product_image',
        'product_wareHouse',
        'product_route',
        'buy_date',
        'expire_date',
        'buying_price',
        'selling_price',
    ];
}
