<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonShopImage extends Model
{
    protected $fillable = ['offer_id', 'offer_image'];

    public function image()
    {
        return $this->belongsTo(CommonShopOffers::class);
    }
}

