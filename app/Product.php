<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Product extends Model
{
  

    protected $fillable = [
        'id', 'product_name', 'product_code','details','details','logo'
    ];





     

     public function product()
     {
         return $this->belongsToMany(Shop::class);
     }
}