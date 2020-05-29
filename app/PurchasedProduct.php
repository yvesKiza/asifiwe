<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedProduct extends Model
{
    public function supplier(){
        return $this->belongsTo('App\Supplier','supplier_id');
   }
   public function user(){
    return $this->belongsTo('App\User','user_id');
    
}
public function product(){
    return $this->belongsTo('App\Product','product_id');
    
}
}
