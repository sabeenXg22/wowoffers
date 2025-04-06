<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model

{
    protected $fillable = [
        'id','country_id','state_id','district_id', 'shop_name', 'shop_logo','click_count', 'details', 'location', 'city', 'address_line_1', 'post_code', 'state'
    ];

    // public function product()
    // {
    //     return $this->belongsToMany(Shop::class);
    // }

    public function shop()
    {


        return $this->belongsToMany(Product::class, 'products_shop', 'product_id', 'shop_id');
    }
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
}
