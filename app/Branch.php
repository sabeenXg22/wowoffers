<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    protected $fillable = [
        'id', 'country_id','state_id','district_id','shop_id','branch_logo', 'branch_name', 'branch_address','location','click_count'
    ];




    // public function shop()
    // {
    //     return $this->belongsTo(Shop::class);
    // }
    public function branches()
{
    return $this->hasMany(Branch::class);
}
 public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}

