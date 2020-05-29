<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('product_type_id')->unsigned();
            $table->string('quantity_per_pack');
            $table->bigInteger('manufacturer_id')->unsigned();
            $table->float('selling_price');
          
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('product_types');
    }
}
