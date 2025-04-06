<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $fillable = [
        'id', 'state_id','district_name',
    ];
    
    public function district()
    {
        return $this->belongsToMany(State::class);
    }
}
