<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product(){
        return $this->belongsTo('App\Product','product_id');
        
    }
    public function stock(){
        return $this->belongsTo('App\ProductStock','stock_id');
        
    }
}
