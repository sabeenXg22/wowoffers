<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useroverviews extends Model
{
    protected $fillable = [
        'id', 'user_id','shop_id','branch_id','shop_count','branch_count'
    ];
}
