<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type(){
        return $this->belongsTo('App\ProductType','product_type_id');
   }
   public function manufacturer(){
    return $this->belongsTo('App\Manufacturer','manufacturer_id');
    
    }
    public function priceHistory(){
        return $this->hasMany('App\ProductSellingPriceHistory','product_id');
    }
    public function sales(){
        return $this->hasMany('App\SoldProduct','product_id');
    }
    public function purchases(){
        return $this->hasMany('App\PurchasedProduct','product_id');
    }
    public function stock(){
        return $this->hasMany('App\ProductStock','product_id');
    }
    public function  getFullNameAttribute(){
      return  $this->name."  ".$this->type->name."  ";
    }
    






}
