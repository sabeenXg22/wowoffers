<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonShopOffers extends Model
{
    protected $fillable = [
        'id', 'shop_id', 'branch_id', 'offer_name','offer_code','offer_start_date','offer_end_date'
    ];
    public function offer()
    {
        return $this->belongsTo(Shop::class);
    }
   
    public function images()
    {
        return $this->hasMany(CommonShopImage::class,'offer_id','id')->orderBy('id', 'asc');
    }
}
