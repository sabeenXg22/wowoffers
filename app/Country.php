<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'id', 'country_name',
    ];

    public function contry()
    {
        return $this->hasMany(State::class);
    }
}
