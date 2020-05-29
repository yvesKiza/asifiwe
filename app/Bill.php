<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function products(){
        return $this->hasMany('App\SoldProduct','bill_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
        
    }
    
}
