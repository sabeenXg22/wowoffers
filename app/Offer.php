<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
  
    protected $fillable = [
        'id', 'shop_id', 'branch_id', 'click_count','offer_name','offer_code','offer_start_date','offer_end_date'
    ];

   public function offer()
    {
        return $this->belongsTo(Shop::class);
    }
    // public function offers()
    // {
    //     return $this->belongsTo(Branch::class);
    // }
    public function images()
    {
        return $this->hasMany(OfferImages::class)->orderBy('id', 'asc');
    }
    public function Coverimage()
{
    return $this->hasMany(OfferImages::class)->orderBy('id', 'asc')->limit(1);
}
    public function offers()
{
    return $this->belongsTo(Branch::class, 'branch_id');
}

}
