<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $fillable = [
        'id', 'state_name','country_id',
    ];
    public function state()
    {
        return $this->belongsToMany(Country::class);
    }
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
