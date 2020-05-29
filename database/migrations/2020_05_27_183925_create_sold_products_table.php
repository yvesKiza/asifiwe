<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_products', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('product_id');
      
           
           $table->date('expiry_date');
           $table->float('selling_price');
           $table->integer('quantity');
           $table->unsignedBigInteger('bill_id');
           
           $table->foreign('product_id')->references('id')->on('products');
           $table->foreign('bill_id')->references('id')->on('bills');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
