<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state');
            $table->string('country');
            $table->string('municipality');
            $table->string('street');
            $table->string('interiorNumber');
            $table->string('exteriorNumber');
            $table->string('postalCode');
            $table->string('Reference');
            $table->string('talephoneNumber',10);
            $table->bigInteger('salesId')->unsigned();
            $table->foreign('salesId')->references('id')->on('sales'); 
            $table->rememberToken();
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
        Schema::dropIfExists('shipping_routes');
    }
}
