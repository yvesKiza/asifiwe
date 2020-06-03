<?php

namespace App\Custom;

use App\ProductStock;
use App\RemovedProduct;
use Illuminate\Support\Facades\DB;

class Expired{
   public static function expired()
   {
      $stocks=ProductStock::whereDate('expiry_date','<=' ,DB::raw('CURDATE()'))->get();

      DB::beginTransaction();
      try{
      foreach($stocks as $x){
        $removed=new RemovedProduct;
        $removed->product_id=$x->product->id;
        $removed->expiry_date=$x->expiry_date;
        $removed->quantity=$x->quantity;
        $removed->reason="expired";
       
        $removed->save();
        $x->delete();
       
      }
      DB::commit();
    } catch (Exception $e) {
        DB::rollback(); 
}
      }
   
}