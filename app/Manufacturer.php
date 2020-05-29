<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function products(){
        return $this->hasMany('App\Product','manufacturer_id');
    }
}
