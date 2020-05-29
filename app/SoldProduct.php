<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
        
    }
    public function product(){
        return $this->belongsTo('App\Product','product_id');
        
    }
    public function bill(){
        return $this->belongsTo('App\Bill','bill_id');
        
    }

    
}
