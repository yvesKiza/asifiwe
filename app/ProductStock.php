<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    public function product(){
        return $this->belongsTo('App\Product','product_id');
        
    }
    public function getFullNameAttribute()
    {
        return $this->product->full_name." exp: ".$this->expiry_date." ,quantity: ".$this->quantity;
    }
    

    


}
