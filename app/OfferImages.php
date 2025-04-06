<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferImages extends Model
{
    protected $fillable = ['offer_id', 'offer_image'];

    // public function offer()
    // {
    //     return $this->belongsTo(Offer::class);
    // }
    public function image()
    {
        return $this->belongsTo(Offer::class);
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id'); // Adjust the foreign key if needed
    }
}
