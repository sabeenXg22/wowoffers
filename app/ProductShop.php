<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductShop extends Model
{
    protected $fillable = [
        'id', 'product_id', 'shop_id','offer_start_date','offer_end_date',
    ];
}
